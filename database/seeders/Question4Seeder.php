<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 4)->first();

        $questions = [

            ['question' => '61. mawar – melati', 'answer' => 'bunga'],
            ['question' => '62. mata – telinga', 'answer' => 'indra'],
            ['question' => '63. gula – intan', 'answer' => 'rasa'],
            ['question' => '64. hujan – salju', 'answer' => 'musim'],
            ['question' => '65. pengantar surat – telepon', 'answer' => 'alat komunikasi'],
            ['question' => '66. kamera – kacamata', 'answer' => 'lensa'],
            ['question' => '67. lambung – usus', 'answer' => 'organ dalam'],
            ['question' => '68. banyak – sedikit', 'answer' => 'kuantitas'],
            ['question' => '69. telur – benih', 'answer' => 'kehidupan'],
            ['question' => '70. bendera – lencana', 'answer' => 'lambang'],
            ['question' => '71. rumput – gajah', 'answer' => 'besar'],
            ['question' => '72. ember – kantong', 'answer' => 'tempat'],
            ['question' => '73. awal – akhir', 'answer' => 'perjalanan'],
            ['question' => '74. kikir – boros', 'answer' => 'keuangan'],
            ['question' => '75. penawaran – permintaan', 'answer' => 'diskusi'],
            ['question' => '76. atas – bawah', 'answer' => 'arah'],

        ];

        foreach ($questions as $q) {

            Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'essay',
                'correct_answer' => $q['answer'], // kunci jawaban
                'weight' => 1
            ]);
        }
    }
}
