<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 6)->first();

        $questions = [

            ['question' => '97. 6 9 12 15 18 21 24 ?', 'answer' => '27'],
            ['question' => '98. 15 16 18 19 21 22 24 ?', 'answer' => '25'],
            ['question' => '99. 19 18 22 21 25 24 28 ?', 'answer' => '27'],
            ['question' => '100. 16 12 17 13 18 14 19 ?', 'answer' => '15'],
            ['question' => '101. 2 4 8 10 20 22 44 ?', 'answer' => '46'],
            ['question' => '102. 15 13 16 12 17 11 18 ?', 'answer' => '10'],
            ['question' => '103. 25 22 11 33 30 15 45 ?', 'answer' => '24'],
            ['question' => '104. 49 51 54 27 9 11 14 ?', 'answer' => '7'],
            ['question' => '105. 2 3 1 3 4 2 4 ?', 'answer' => '5'],
            ['question' => '106. 19 17 20 16 21 15 22 ?', 'answer' => '14'],
            ['question' => '107. 94 92 46 44 22 20 10 ?', 'answer' => '8'],
            ['question' => '108. 5 8 9 8 11 12 11 ?', 'answer' => '14'],
            ['question' => '109. 12 15 19 23 28 33 39 ?', 'answer' => '45'],
            ['question' => '110. 7 5 10 7 21 17 68 ?', 'answer' => '36'],
            ['question' => '111. 11 15 18 9 13 16 8 ?', 'answer' => '12'],
            ['question' => '112. 3 8 15 24 35 48 63 ?', 'answer' => '80'],
            ['question' => '113. 4 5 7 4 8 13 7 ?', 'answer' => '14'],
            ['question' => '114. 8 5 15 18 6 3 9 ?', 'answer' => '12'],
            ['question' => '115. 15 6 18 10 30 23 69 ?', 'answer' => '36'],
            ['question' => '116. 5 35 28 4 11 77 70 ?', 'answer' => '10'],

        ];

        foreach ($questions as $q) {

            Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'number_choice',
                'correct_answer' => $q['answer'],
                'weight' => 1,
            ]);
        }
    }
}
