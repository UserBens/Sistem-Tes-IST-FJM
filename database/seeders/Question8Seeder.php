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
            'b' => 'group1_08_a.png',
            'c' => 'group1_08_a.png',
            'd' => 'group1_08_a.png',
            'e' => 'group1_08_a.png',
        ];

        $questions = [
            ['question' => '137.png', 'options' => $group_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '138.png', 'options' => $group_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '139.png', 'options' => $group_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '140.png', 'options' => $group_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '141.png', 'options' => $group_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '142.png', 'options' => $group_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '143.png', 'options' => $group_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '144.png', 'options' => $group_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '145.png', 'options' => $group_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '146.png', 'options' => $group_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '147.png', 'options' => $group_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '148.png', 'options' => $group_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '149.png', 'options' => $group_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '150.png', 'options' => $group_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '151.png', 'options' => $group_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '152.png', 'options' => $group_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '153.png', 'options' => $group_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '154.png', 'options' => $group_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '155.png', 'options' => $group_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '156.png', 'options' => $group_options, 'answer' => 'e'], // ← sesuaikan jawaban
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
