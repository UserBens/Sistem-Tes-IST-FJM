<?php

namespace App\Services;

use App\Models\IstIqNorm;
use App\Models\IstResult;
use App\Models\IstSwNorm;
use App\Models\Participants;
use App\Models\TestAttempts;
use Carbon\Carbon;

class ISTScoreService
{
    /**
     * Kode IST yang valid (urutan standar)
     */
    private array $validCodes = ['SE', 'WA', 'AN', 'GE', 'ME', 'RA', 'ZR', 'FA', 'WU'];

    /**
     * Subtest kelompok VERBAL
     */
    private array $verbalSubtests = ['SE', 'WA', 'AN', 'GE', 'ME'];

    /**
     * Subtest kelompok EKSAK / NUMERIK
     */
    private array $eksaktSubtests = ['RA', 'ZR', 'FA', 'WU'];

    /**
     * Hitung dan simpan hasil IST lengkap untuk seorang peserta.
     */
    public function calculateAndSave(Participants $participant): IstResult
    {
        $age      = $this->getAge($participant->birth_date);
        $ageGroup = $this->getAgeGroup($age);

        $attempts = TestAttempts::with('subtest')
            ->where('participant_id', $participant->id)
            ->get();

        // 1. Kumpulkan RW
        $rwScores = [];
        foreach ($attempts as $attempt) {
            $code = strtoupper(trim($attempt->subtest->code ?? ''));
            if (in_array($code, $this->validCodes)) {
                $rwScores[$code] = $attempt->score;
            }
        }

        // 2. Konversi RW -> SW
        $swScores   = [];
        $categories = [];
        foreach ($this->validCodes as $code) {
            $rw = $rwScores[$code] ?? 0;
            $sw = $this->getRwToSw($ageGroup, $code, $rw);

            // Jaga-jaga jika null, set ke 0
            $swScores[$code]   = $sw ?? 0;
            $categories[$code] = $this->getSwCategory($swScores[$code]);
        }

        // 3. Hitung total RW
        $totalRw = array_sum($rwScores);

        // 4. Hitung TOTAL SW (Gesamt) & IQ dari tabel Norma IQ
        // Berdasarkan data Anda, Total RW digunakan untuk mencari Nilai IQ dan (mungkin) Gesamt SW
        // Kita perlu mengubah getIqFromNorm agar mengembalikan array [Total SW, IQ]
        $normaIqData = $this->getIqDataFromNorm($age, $totalRw);

        // Asumsi: getIqDataFromNorm mengembalikan [ 'gesamt_sw' => 89, 'iq' => 84 ]
        $totalSw    = $normaIqData['gesamt_sw'] ?? null;
        $iq         = $normaIqData['iq'] ?? null;
        $iqCategory = $this->getIqCategory($iq);

        // 5. Dominasi
        $dominasi = $this->getDominasi($swScores);

        // 6. Simpan
        $result = IstResult::updateOrCreate(
            ['participant_id' => $participant->id],
            [
                'rw_se' => $rwScores['SE'] ?? 0,
                'rw_wa' => $rwScores['WA'] ?? 0,
                'rw_an' => $rwScores['AN'] ?? 0,
                'rw_ge' => $rwScores['GE'] ?? 0,
                'rw_me' => $rwScores['ME'] ?? 0,
                'rw_ra' => $rwScores['RA'] ?? 0,
                'rw_zr' => $rwScores['ZR'] ?? 0,
                'rw_fa' => $rwScores['FA'] ?? 0,
                'rw_wu' => $rwScores['WU'] ?? 0,

                'sw_se' => $swScores['SE'],
                'sw_wa' => $swScores['WA'],
                'sw_an' => $swScores['AN'],
                'sw_ge' => $swScores['GE'],
                'sw_me' => $swScores['ME'],
                'sw_ra' => $swScores['RA'],
                'sw_zr' => $swScores['ZR'],
                'sw_fa' => $swScores['FA'],
                'sw_wu' => $swScores['WU'],

                'cat_se' => $categories['SE'],
                'cat_wa' => $categories['WA'],
                'cat_an' => $categories['AN'],
                'cat_ge' => $categories['GE'],
                'cat_me' => $categories['ME'],
                'cat_ra' => $categories['RA'],
                'cat_zr' => $categories['ZR'],
                'cat_fa' => $categories['FA'],
                'cat_wu' => $categories['WU'],

                'total_rw'    => $totalRw,
                'total_sw'    => $totalSw, // Sekarang disave
                'iq'          => $iq,
                'iq_category' => $iqCategory,
                'dominasi'    => $dominasi,
            ]
        );

        return $result;
    }

    // ==============================================================
    // PRIVATE HELPERS
    // ==============================================================

    private function getAge(string $birthDate): int
    {
        return Carbon::parse($birthDate)->age;
    }

    private function getAgeGroup(int $age): string
    {
        if ($age <= 24) return 'lte24';
        if ($age <= 28) return 'lte28';
        if ($age <= 33) return 'lte33';
        if ($age <= 39) return 'lte39';
        if ($age <= 45) return 'lte45';
        return 'lte60';
    }

    private function getRwToSw(string $ageGroup, string $subtest, int $rw): ?int
    {
        $norm = IstSwNorm::where('age_group', $ageGroup)
            ->where('subtest_name', $subtest)
            ->where('rw', '<=', $rw)
            ->orderByDesc('rw')
            ->first();

        return $norm?->sw;
    }

    /**
     * Mengambil Total SW (Gesamt SW) berdasarkan usia, dan Nilai IQ absolut.
     * Mengembalikan array: ['gesamt_sw' => int, 'iq' => int]
     */
    private function getIqDataFromNorm(int $age, int $totalRw): array
    {
        // STEP 1 : Cari baris berdasarkan TOTAL RW
        $norm = IstIqNorm::where('total_rw', '<=', $totalRw)
            ->orderByDesc('total_rw')
            ->first();

        if (!$norm) {
            return ['gesamt_sw' => null, 'iq' => null];
        }

        // STEP 2 : tentukan kolom umur
        $column = $this->getIqColumn($age);

        // STEP 3 : ambil SW dari kolom umur
        $gesamtSw = $norm->{$column};

        // STEP 4 : SW dipakai lagi untuk cari IQ
        $iqNorm = IstIqNorm::where('total_rw', '<=', $gesamtSw)
            ->orderByDesc('total_rw')
            ->first();

        return [
            'gesamt_sw' => $gesamtSw,
            'iq'        => $iqNorm?->iq_value
        ];
    }

    private function getIqColumn(int $age): string
    {
        if ($age == 13) return 'iq_age_13';
        if ($age == 14) return 'iq_age_14';
        if ($age == 15) return 'iq_age_15';
        if ($age == 16) return 'iq_age_16';
        if ($age == 17) return 'iq_age_17';
        if ($age == 18) return 'iq_age_18';
        if ($age <= 20) return 'iq_lte20';
        if ($age <= 24) return 'iq_lte24';
        if ($age <= 28) return 'iq_lte28';
        if ($age <= 33) return 'iq_lte33';
        if ($age <= 39) return 'iq_lte39';
        if ($age <= 45) return 'iq_lte45';
        return 'iq_lte60';
    }

    public function getSwCategory(?int $sw): string
    {
        if ($sw === null) return '-';
        if ($sw >= 120)   return 'Sangat Tinggi';
        if ($sw >= 110)   return 'Tinggi';
        if ($sw >= 100)   return 'Cukup';
        if ($sw >= 90)    return 'Sedang';
        if ($sw >= 80)    return 'Rendah';
        if ($sw >= 70)    return 'Sangat Rendah';
        return 'Defektif';
    }

    public function getIqCategory(?int $iq): string
    {
        if ($iq === null) return '-';
        if ($iq >= 130)   return 'Very Superior';
        if ($iq >= 120)   return 'Superior';
        if ($iq >= 110)   return 'High Average';
        if ($iq >= 90)    return 'Average';
        if ($iq >= 80)    return 'Low Average';
        if ($iq >= 70)    return 'Borderline';
        return 'Extremely Low';
    }

    private function getDominasi(array $swScores): string
    {
        $verbalSws = array_filter(
            array_map(fn($k) => $swScores[$k] ?? null, $this->verbalSubtests),
            fn($v) => $v !== null
        );

        $eksaktSws = array_filter(
            array_map(fn($k) => $swScores[$k] ?? null, $this->eksaktSubtests),
            fn($v) => $v !== null
        );

        if (empty($verbalSws) || empty($eksaktSws)) {
            return 'Non Eksak';
        }

        $avgVerbal = array_sum($verbalSws) / count($verbalSws);
        $avgEksakt = array_sum($eksaktSws) / count($eksaktSws);
        $diff      = abs($avgVerbal - $avgEksakt);

        if ($diff < 10) return 'Non Eksak';

        return $avgVerbal > $avgEksakt ? 'Verbal' : 'Eksak';
    }
}
