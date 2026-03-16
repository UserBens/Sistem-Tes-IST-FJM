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
            ['question' => '157. Kata yang mempunyai huruf permulaan – A – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '158. Kata yang mempunyai huruf permulaan – B – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '159. Kata yang mempunyai huruf permulaan – C – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '160. Kata yang mempunyai huruf permulaan – D – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '161. Kata yang mempunyai huruf permulaan – E – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '162. Kata yang mempunyai huruf permulaan – F – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '163. Kata yang mempunyai huruf permulaan – G – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '164. Kata yang mempunyai huruf permulaan – H – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '165. Kata yang mempunyai huruf permulaan – I – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '166. Kata yang mempunyai huruf permulaan – J – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '167. Kata yang mempunyai huruf permulaan – K – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '168. Kata yang mempunyai huruf permulaan – L – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '169. Kata yang mempunyai huruf permulaan – M – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '170. Kata yang mempunyai huruf permulaan – N – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '171. Kata yang mempunyai huruf permulaan – O – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '172. Kata yang mempunyai huruf permulaan – P – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '173. Kata yang mempunyai huruf permulaan – R – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '174. Kata yang mempunyai huruf permulaan – S – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '175. Kata yang mempunyai huruf permulaan – T – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
            ['question' => '176. Kata yang mempunyai huruf permulaan – U – adalah …….', 'options' => ['bunga', 'perkakas', 'burung', 'kesenian', 'binatang']],
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
