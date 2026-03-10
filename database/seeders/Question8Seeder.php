<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question8Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 8)->first();

        $group_options = [
            'a' => 'group1_08_a.png',
            'b' => 'group1_08_b.png',
            'c' => 'group1_08_c.png',
            'd' => 'group1_08_d.png',
            'e' => 'group1_08_e.png',
        ];

        $questions = [
            ['question' => '137.png', 'options' => $group_options, 'answer' => 'c'],
            ['question' => '138.png', 'options' => $group_options, 'answer' => 'a'],
            ['question' => '139.png', 'options' => $group_options, 'answer' => 'd'],
            ['question' => '140.png', 'options' => $group_options, 'answer' => 'e'],
            ['question' => '141.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '142.png', 'options' => $group_options, 'answer' => 'a'],
            ['question' => '143.png', 'options' => $group_options, 'answer' => 'd'],
            ['question' => '144.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '145.png', 'options' => $group_options, 'answer' => 'e'],
            ['question' => '146.png', 'options' => $group_options, 'answer' => 'c'],
            ['question' => '147.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '148.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '149.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '150.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '151.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '152.png', 'options' => $group_options, 'answer' => 'd'],
            ['question' => '153.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '154.png', 'options' => $group_options, 'answer' => 'b'],
            ['question' => '155.png', 'options' => $group_options, 'answer' => 'd'],
            ['question' => '156.png', 'options' => $group_options, 'answer' => 'b'],
        ];

        foreach ($questions as $q) {

            $question = Question::create([
                'subtest_id'    => $subtest->id,
                'question'      => $q['question'],
                'question_type' => 'single_choice',
                'weight'        => 1,
            ]);

            foreach ($q['options'] as $huruf => $option_img) {

                QuestionOption::create([
                    'question_id'  => $question->id,
                    'option_text'  => null,
                    'option_image' => $option_img,
                    'is_correct'   => ($huruf === $q['answer']),
                ]);
            }
        }
    }
}
