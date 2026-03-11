<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IstSwNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ist_sw_norms')->truncate();

        // ===========================================================
        // DATA NORMA <= 24 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataLte24 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   66,  63,  75,  74,  75,  80,  75,  75,  74],
            [1,   68,  66,  78,  76,  77,  82,  78,  78,  77],
            [2,   71,  69,  80,  77,  80,  84,  80,  80,  79],
            [3,   74,  73,  83,  79,  83,  86,  83,  83,  81],
            [4,   78,  76,  85,  80,  86,  89,  85,  86,  84],
            [5,   80,  80,  88,  82,  88,  91,  88,  89,  86],
            [6,   83,  83,  90,  83,  91,  93,  91,  92,  88],
            [7,   86,  87,  92,  85,  94,  95,  93,  95,  91],
            [8,   89,  91,  95,  86,  97,  97,  96,  97,  93],
            [9,   92,  95,  97,  88,  99,  99,  98,  100, 95],
            [10,  95,  98,  100, 89,  102, 102, 101, 103, 98],
            [11,  98,  102, 102, 91,  105, 104, 103, 106, 100],
            [12,  101, 106, 104, 92,  107, 106, 106, 108, 102],
            [13,  104, 109, 107, 94,  110, 108, 108, 111, 105],
            [14,  107, 113, 109, 95,  113, 110, 111, 114, 107],
            [15,  110, 116, 111, 97,  115, 112, 113, 117, 109],
            [16,  113, 120, 114, 98,  118, 115, 116, 120, 112],
            [17,  116, 124, 116, 100, 121, 117, 119, 122, 114],
            [18,  119, 128, 119, 102, 123, 119, 121, 125, 116],
            [19,  123, 131, 121, 104, 126, 121, 124, 128, 119],
            [20,  126, 135, 123, 105, 129, 124, 127, 131, 121],
            [21,  null, null, null, 107, null, null, null, null, null],
            [22,  null, null, null, 108, null, null, null, null, null],
            [23,  null, null, null, 110, null, null, null, null, null],
            [24,  null, null, null, 111, null, null, null, null, null],
            [25,  null, null, null, 113, null, null, null, null, null],
            [26,  null, null, null, 114, null, null, null, null, null],
            [27,  null, null, null, 116, null, null, null, null, null],
            [28,  null, null, null, 117, null, null, null, null, null],
            [29,  null, null, null, 119, null, null, null, null, null],
            [30,  null, null, null, 120, null, null, null, null, null],
            [31,  null, null, null, 122, null, null, null, null, null],
            [32,  null, null, null, 123, null, null, null, null, null],
        ];

        $this->insertSwData('lte24', $dataLte24);

        // // ===========================================================
        // // DATA NORMA <= 28 TAHUN
        // // (Masukkan data norma usia 25-28 tahun di sini)
        // // Format sama: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // // CATATAN: Ganti nilai null dengan data norma yang sebenarnya
        // // ===========================================================
        // $dataLte28 = [
        //     [0,   67,  64,  76,  75,  76,  81,  76,  76,  75],
        //     [1,   69,  67,  79,  77,  78,  83,  79,  79,  78],
        //     [2,   72,  70,  81,  78,  81,  85,  81,  81,  80],
        //     [3,   75,  74,  84,  80,  84,  87,  84,  84,  82],
        //     [4,   79,  77,  86,  81,  87,  90,  86,  87,  85],
        //     [5,   81,  81,  89,  83,  89,  92,  89,  90,  87],
        //     [6,   84,  84,  91,  84,  92,  94,  92,  93,  89],
        //     [7,   87,  88,  93,  86,  95,  96,  94,  96,  92],
        //     [8,   90,  92,  96,  87,  98,  98,  97,  98,  94],
        //     [9,   93,  96,  98,  89,  100, 100, 99,  101, 96],
        //     [10,  96,  99,  101, 90,  103, 103, 102, 104, 99],
        //     [11,  99,  103, 103, 92,  106, 105, 104, 107, 101],
        //     [12,  102, 107, 105, 93,  108, 107, 107, 109, 103],
        //     [13,  105, 110, 108, 95,  111, 109, 109, 112, 106],
        //     [14,  108, 114, 110, 96,  114, 111, 112, 115, 108],
        //     [15,  111, 117, 112, 98,  116, 113, 114, 118, 110],
        //     [16,  114, 121, 115, 99,  119, 116, 117, 121, 113],
        //     [17,  117, 125, 117, 101, 122, 118, 120, 123, 115],
        //     [18,  120, 129, 120, 103, 124, 120, 122, 126, 117],
        //     [19,  124, 132, 122, 105, 127, 122, 125, 129, 120],
        //     [20,  127, 136, 124, 106, 130, 125, 128, 132, 122],
        //     [21,  null, null, null, 108, null, null, null, null, null],
        //     [22,  null, null, null, 109, null, null, null, null, null],
        //     [23,  null, null, null, 111, null, null, null, null, null],
        //     [24,  null, null, null, 112, null, null, null, null, null],
        //     [25,  null, null, null, 114, null, null, null, null, null],
        //     [26,  null, null, null, 115, null, null, null, null, null],
        //     [27,  null, null, null, 117, null, null, null, null, null],
        //     [28,  null, null, null, 118, null, null, null, null, null],
        //     [29,  null, null, null, 120, null, null, null, null, null],
        //     [30,  null, null, null, 121, null, null, null, null, null],
        //     [31,  null, null, null, 123, null, null, null, null, null],
        //     [32,  null, null, null, 124, null, null, null, null, null],
        // ];

        // $this->insertSwData('lte28', $dataLte28);

        // // ===========================================================
        // // DATA NORMA <= 33 TAHUN
        // // (Masukkan data norma usia 29-33 tahun di sini)
        // // ===========================================================
        // $dataLte33 = [
        //     [0,   68,  65,  77,  76,  77,  82,  77,  77,  76],
        //     [1,   70,  68,  80,  78,  79,  84,  80,  80,  79],
        //     [2,   73,  71,  82,  79,  82,  86,  82,  82,  81],
        //     [3,   76,  75,  85,  81,  85,  88,  85,  85,  83],
        //     [4,   80,  78,  87,  82,  88,  91,  87,  88,  86],
        //     [5,   82,  82,  90,  84,  90,  93,  90,  91,  88],
        //     [6,   85,  85,  92,  85,  93,  95,  93,  94,  90],
        //     [7,   88,  89,  94,  87,  96,  97,  95,  97,  93],
        //     [8,   91,  93,  97,  88,  99,  99,  98,  99,  95],
        //     [9,   94,  97,  99,  90,  101, 101, 100, 102, 97],
        //     [10,  97,  100, 102, 91,  104, 104, 103, 105, 100],
        //     [11,  100, 104, 104, 93,  107, 106, 105, 108, 102],
        //     [12,  103, 108, 106, 94,  109, 108, 108, 110, 104],
        //     [13,  106, 111, 109, 96,  112, 110, 110, 113, 107],
        //     [14,  109, 115, 111, 97,  115, 112, 113, 116, 109],
        //     [15,  112, 118, 113, 99,  117, 114, 115, 119, 111],
        //     [16,  115, 122, 116, 100, 120, 117, 118, 122, 114],
        //     [17,  118, 126, 118, 102, 123, 119, 121, 124, 116],
        //     [18,  121, 130, 121, 104, 125, 121, 123, 127, 118],
        //     [19,  125, 133, 123, 106, 128, 123, 126, 130, 121],
        //     [20,  128, 137, 125, 107, 131, 126, 129, 133, 123],
        //     [21,  null, null, null, 109, null, null, null, null, null],
        //     [22,  null, null, null, 110, null, null, null, null, null],
        //     [23,  null, null, null, 112, null, null, null, null, null],
        //     [24,  null, null, null, 113, null, null, null, null, null],
        //     [25,  null, null, null, 115, null, null, null, null, null],
        //     [26,  null, null, null, 116, null, null, null, null, null],
        //     [27,  null, null, null, 118, null, null, null, null, null],
        //     [28,  null, null, null, 119, null, null, null, null, null],
        //     [29,  null, null, null, 121, null, null, null, null, null],
        //     [30,  null, null, null, 122, null, null, null, null, null],
        //     [31,  null, null, null, 124, null, null, null, null, null],
        //     [32,  null, null, null, 125, null, null, null, null, null],
        // ];

        // $this->insertSwData('lte33', $dataLte33);

        // // ===========================================================
        // // DATA NORMA <= 39 TAHUN
        // // ===========================================================
        // $dataLte39 = [
        //     [0,   69,  66,  78,  77,  78,  83,  78,  78,  77],
        //     [1,   71,  69,  81,  79,  80,  85,  81,  81,  80],
        //     [2,   74,  72,  83,  80,  83,  87,  83,  83,  82],
        //     [3,   77,  76,  86,  82,  86,  89,  86,  86,  84],
        //     [4,   81,  79,  88,  83,  89,  92,  88,  89,  87],
        //     [5,   83,  83,  91,  85,  91,  94,  91,  92,  89],
        //     [6,   86,  86,  93,  86,  94,  96,  94,  95,  91],
        //     [7,   89,  90,  95,  88,  97,  98,  96,  98,  94],
        //     [8,   92,  94,  98,  89,  100, 100, 99,  100, 96],
        //     [9,   95,  98,  100, 91,  102, 102, 101, 103, 98],
        //     [10,  98,  101, 103, 92,  105, 105, 104, 106, 101],
        //     [11,  101, 105, 105, 94,  108, 107, 106, 109, 103],
        //     [12,  104, 109, 107, 95,  110, 109, 109, 111, 105],
        //     [13,  107, 112, 110, 97,  113, 111, 111, 114, 108],
        //     [14,  110, 116, 112, 98,  116, 113, 114, 117, 110],
        //     [15,  113, 119, 114, 100, 118, 115, 116, 120, 112],
        //     [16,  116, 123, 117, 101, 121, 118, 119, 123, 115],
        //     [17,  119, 127, 119, 103, 124, 120, 122, 125, 117],
        //     [18,  122, 131, 122, 105, 126, 122, 124, 128, 119],
        //     [19,  126, 134, 124, 107, 129, 124, 127, 131, 122],
        //     [20,  129, 138, 126, 108, 132, 127, 130, 134, 124],
        //     [21,  null, null, null, 110, null, null, null, null, null],
        //     [22,  null, null, null, 111, null, null, null, null, null],
        //     [23,  null, null, null, 113, null, null, null, null, null],
        //     [24,  null, null, null, 114, null, null, null, null, null],
        //     [25,  null, null, null, 116, null, null, null, null, null],
        //     [26,  null, null, null, 117, null, null, null, null, null],
        //     [27,  null, null, null, 119, null, null, null, null, null],
        //     [28,  null, null, null, 120, null, null, null, null, null],
        //     [29,  null, null, null, 122, null, null, null, null, null],
        //     [30,  null, null, null, 123, null, null, null, null, null],
        //     [31,  null, null, null, 125, null, null, null, null, null],
        //     [32,  null, null, null, 126, null, null, null, null, null],
        // ];

        // $this->insertSwData('lte39', $dataLte39);

        // // ===========================================================
        // // DATA NORMA <= 45 TAHUN
        // // ===========================================================
        // $dataLte45 = [
        //     [0,   70,  67,  79,  78,  79,  84,  79,  79,  78],
        //     [1,   72,  70,  82,  80,  81,  86,  82,  82,  81],
        //     [2,   75,  73,  84,  81,  84,  88,  84,  84,  83],
        //     [3,   78,  77,  87,  83,  87,  90,  87,  87,  85],
        //     [4,   82,  80,  89,  84,  90,  93,  89,  90,  88],
        //     [5,   84,  84,  92,  86,  92,  95,  92,  93,  90],
        //     [6,   87,  87,  94,  87,  95,  97,  95,  96,  92],
        //     [7,   90,  91,  96,  89,  98,  99,  97,  99,  95],
        //     [8,   93,  95,  99,  90,  101, 101, 100, 101, 97],
        //     [9,   96,  99,  101, 92,  103, 103, 102, 104, 99],
        //     [10,  99,  102, 104, 93,  106, 106, 105, 107, 102],
        //     [11,  102, 106, 106, 95,  109, 108, 107, 110, 104],
        //     [12,  105, 110, 108, 96,  111, 110, 110, 112, 106],
        //     [13,  108, 113, 111, 98,  114, 112, 112, 115, 109],
        //     [14,  111, 117, 113, 99,  117, 114, 115, 118, 111],
        //     [15,  114, 120, 115, 101, 119, 116, 117, 121, 113],
        //     [16,  117, 124, 118, 102, 122, 119, 120, 124, 116],
        //     [17,  120, 128, 120, 104, 125, 121, 123, 126, 118],
        //     [18,  123, 132, 123, 106, 127, 123, 125, 129, 120],
        //     [19,  127, 135, 125, 108, 130, 125, 128, 132, 123],
        //     [20,  130, 139, 127, 109, 133, 128, 131, 135, 125],
        //     [21,  null, null, null, 111, null, null, null, null, null],
        //     [22,  null, null, null, 112, null, null, null, null, null],
        //     [23,  null, null, null, 114, null, null, null, null, null],
        //     [24,  null, null, null, 115, null, null, null, null, null],
        //     [25,  null, null, null, 117, null, null, null, null, null],
        //     [26,  null, null, null, 118, null, null, null, null, null],
        //     [27,  null, null, null, 120, null, null, null, null, null],
        //     [28,  null, null, null, 121, null, null, null, null, null],
        //     [29,  null, null, null, 123, null, null, null, null, null],
        //     [30,  null, null, null, 124, null, null, null, null, null],
        //     [31,  null, null, null, 126, null, null, null, null, null],
        //     [32,  null, null, null, 127, null, null, null, null, null],
        // ];

        // $this->insertSwData('lte45', $dataLte45);

        // // ===========================================================
        // // DATA NORMA <= 60 TAHUN
        // // ===========================================================
        // $dataLte60 = [
        //     [0,   71,  68,  80,  79,  80,  85,  80,  80,  79],
        //     [1,   73,  71,  83,  81,  82,  87,  83,  83,  82],
        //     [2,   76,  74,  85,  82,  85,  89,  85,  85,  84],
        //     [3,   79,  78,  88,  84,  88,  91,  88,  88,  86],
        //     [4,   83,  81,  90,  85,  91,  94,  90,  91,  89],
        //     [5,   85,  85,  93,  87,  93,  96,  93,  94,  91],
        //     [6,   88,  88,  95,  88,  96,  98,  96,  97,  93],
        //     [7,   91,  92,  97,  90,  99,  100, 98,  100, 96],
        //     [8,   94,  96,  100, 91,  102, 102, 101, 102, 98],
        //     [9,   97,  100, 102, 93,  104, 104, 103, 105, 100],
        //     [10,  100, 103, 105, 94,  107, 107, 106, 108, 103],
        //     [11,  103, 107, 107, 96,  110, 109, 108, 111, 105],
        //     [12,  106, 111, 109, 97,  112, 111, 111, 113, 107],
        //     [13,  109, 114, 112, 99,  115, 113, 113, 116, 110],
        //     [14,  112, 118, 114, 100, 118, 115, 116, 119, 112],
        //     [15,  115, 121, 116, 102, 120, 117, 118, 122, 114],
        //     [16,  118, 125, 119, 103, 123, 120, 121, 125, 117],
        //     [17,  121, 129, 121, 105, 126, 122, 124, 127, 119],
        //     [18,  124, 133, 124, 107, 128, 124, 126, 130, 121],
        //     [19,  128, 136, 126, 109, 131, 126, 129, 133, 124],
        //     [20,  131, 140, 128, 110, 134, 129, 132, 136, 126],
        //     [21,  null, null, null, 112, null, null, null, null, null],
        //     [22,  null, null, null, 113, null, null, null, null, null],
        //     [23,  null, null, null, 115, null, null, null, null, null],
        //     [24,  null, null, null, 116, null, null, null, null, null],
        //     [25,  null, null, null, 118, null, null, null, null, null],
        //     [26,  null, null, null, 119, null, null, null, null, null],
        //     [27,  null, null, null, 121, null, null, null, null, null],
        //     [28,  null, null, null, 122, null, null, null, null, null],
        //     [29,  null, null, null, 124, null, null, null, null, null],
        //     [30,  null, null, null, 125, null, null, null, null, null],
        //     [31,  null, null, null, 127, null, null, null, null, null],
        //     [32,  null, null, null, 128, null, null, null, null, null],
        // ];

        // $this->insertSwData('lte60', $dataLte60);

        $this->command->info('IST SW Norms seeded successfully!');
    }

    /**
     * Insert data SW ke database.
     * @param string $ageGroup Kelompok umur
     * @param array $data Array [rw, se, wa, an, ge, ra, zr, fa, wu, me]
     */
    private function insertSwData(string $ageGroup, array $data): void
    {
        $subtests = ['SE', 'WA', 'AN', 'GE', 'RA', 'ZR', 'FA', 'WU', 'ME'];
        $rows = [];
        $now = now();

        foreach ($data as $row) {
            $rw = $row[0];

            foreach ($subtests as $index => $subtest) {
                $sw = $row[$index + 1];

                if ($sw !== null) {
                    $rows[] = [
                        'age_group'    => $ageGroup,
                        'subtest_name' => $subtest,
                        'rw'           => $rw,
                        'sw'           => $sw,
                        'created_at'   => $now,
                        'updated_at'   => $now,
                    ];
                }
            }
        }

        DB::table('ist_sw_norms')->insert($rows);
    }
}
