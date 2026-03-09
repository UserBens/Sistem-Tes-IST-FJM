<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subtest = Subtest::where('order', 2)->first();

        $questions = [

            [
                'question' => '21. Manakah yang berbeda?',
                'options' => ['lingkungan', 'panah', 'elips', 'busur', 'lengkungan'],
                'correct' => 0
            ],
            [
                'question' => '22. Manakah yang berbeda?',
                'options' => ['mengetuk', 'memaki', 'menjahit', 'menggergaji', 'memukul'],
                'correct' => 1
            ],
            [
                'question' => '23. Manakah yang berbeda?',
                'options' => ['lebar', 'keliling', 'luas', 'isi', 'panjang'],
                'correct' => 3
            ],
            [
                'question' => '24. Manakah yang berbeda?',
                'options' => ['mengikat', 'menyatukan', 'melepaskan', 'mengaitkan', 'melekatkan'],
                'correct' => 2
            ],
            [
                'question' => '25. Manakah yang berbeda?',
                'options' => ['arah', 'timur', 'perjalanan', 'tujuan', 'selatan'],
                'correct' => 2
            ],
            [
                'question' => '26. Manakah yang berbeda?',
                'options' => ['jarak', 'perpisahan', 'tugas', 'batas', 'perceraian'],
                'correct' => 2
            ],
            [
                'question' => '27. Manakah yang berbeda?',
                'options' => ['saringan', 'kelambu', 'payung', 'tapisan', 'jala'],
                'correct' => 2
            ],
            [
                'question' => '28. Manakah yang berbeda?',
                'options' => ['putih', 'pucat', 'buram', 'kasar', 'berkilauan'],
                'correct' => 3
            ],
            [
                'question' => '29. Manakah yang berbeda?',
                'options' => ['otobis', 'pesawat terbang', 'sepeda motor', 'sepeda', 'kapal api'],
                'correct' => 3
            ],
            [
                'question' => '30. Manakah yang berbeda?',
                'options' => ['biola', 'seruling', 'klarinet', 'terompet', 'saxophon'],
                'correct' => 3
            ],
            [
                'question' => '31. Manakah yang berbeda?',
                'options' => ['bergelombang', 'kasar', 'berduri', 'licin', 'lurus'],
                'correct' => 4
            ],
            [
                'question' => '32. Manakah yang berbeda?',
                'options' => ['jam', 'kompas', 'penunjuk jalan', 'bintang pari', 'arah'],
                'correct' => 0
            ],
            [
                'question' => '33. Manakah yang berbeda?',
                'options' => ['kebijaksanaan', 'pendidikan', 'perencanaan', 'penempatan', 'pengerahan'],
                'correct' => 0
            ],
            [
                'question' => '34. Manakah yang berbeda?',
                'options' => ['bermotor', 'berjalan', 'berlayar', 'bersepeda', 'berkuda'],
                'correct' => 1
            ],
            [
                'question' => '35. Manakah yang berbeda?',
                'options' => ['gambar', 'lukisan', 'potret', 'patung', 'ukiran'],
                'correct' => 1
            ],
            [
                'question' => '36. Manakah yang berbeda?',
                'options' => ['panjang', 'lonjong', 'runcing', 'bulat', 'bersudut'],
                'correct' => 4
            ],
            [
                'question' => '37. Manakah yang berbeda?',
                'options' => ['kunci', 'palang pintu', 'gerendel', 'gunting', 'obeng'],
                'correct' => 1
            ],
            [
                'question' => '38. Manakah yang berbeda?',
                'options' => ['jembatan', 'batas', 'perkawinan', 'pagar', 'masyarakat'],
                'correct' => 1
            ],
            [
                'question' => '39. Manakah yang berbeda?',
                'options' => ['mengetam', 'menasehati', 'mengasah', 'melicinkan', 'menggosok'],
                'correct' => 1
            ],
            [
                'question' => '40. Manakah yang berbeda?',
                'options' => ['batu', 'baja', 'bulu', 'karet', 'kayu'],
                'correct' => 2
            ],

        ];

        foreach ($questions as $q) {

            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'single_choice',
                'weight' => 1
            ]);

            foreach ($q['options'] as $index => $option) {

                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                    'is_correct' => $index == $q['correct']
                ]);
            }
        }
    }
}
