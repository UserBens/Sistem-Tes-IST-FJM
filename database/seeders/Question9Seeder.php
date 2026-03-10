<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subtest = Subtest::where('order', 9)->first();

        $questions = [
            ['question' => 'Kata yang mempunyai huruf permulaan – A – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – B – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – C – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – D – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – E – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – F – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – G – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – H – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – I – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – J – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – K – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – L – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – M – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – N – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – O – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – P – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – R – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – S – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – T – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => 'Kata yang mempunyai huruf permulaan – U – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
        ];

        $answers = [
            'd',
            'e',
            'b',
            'a',
            'c',
            'a',
            'd',
            'e',
            'c',
            'b',
            'b',
            'a',
            'e',
            'c',
            'd',
            'b',
            'e',
            'a',
            'c',
            'd'
        ];

        $letters = ['a', 'b', 'c', 'd', 'e'];

        foreach ($questions as $index => $q) {

            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'single_choice',
                'weight' => 1
            ]);

            foreach ($q['options'] as $i => $option) {

                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                    'is_correct' => ($letters[$i] === $answers[$index])
                ]);
            }
        }
    }
}
