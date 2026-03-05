<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Question4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil Subtest 04
        $subtest = Subtest::where('order', 4)->first();

        $questions = [
            '1. mawar – melati',
            '2. mata – telinga',
            '3. gula – intan',
            '4. hujan – salju',
            '5. pengantar surat – telepon',
            '6. kamera – kacamata',
            '7. lambung – usus',
            '8. banyak – sedikit',
            '9. telur – benih',
            '10. bendera – lencana',
            '11. rumput – gajah',
            '12. ember – kantong',
            '13. awal – akhir',
            '14. kikir – boros',
            '15. penawaran – permintaan',
            '16. atas – bawah'
        ];

        foreach ($questions as $q) {
            Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q,
                'question_type' => 'essay',
                'weight' => 1
            ]);
        }
    }
}
