<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question7Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 7)->first();

        // ============================================================
        // File gambar langsung di: storage/app/public/
        // Contoh: storage/app/public/117.png
        //         storage/app/public/group1_a.png
        // ============================================================

        // Pilihan GRUP 1 (a=setengah lingkaran, b=oval, c=bentuk M, d=oval miring, e=kipas)
        $group1_options = [
            'a' => 'group1_a.png',
            'b' => 'group1_b.png',
            'c' => 'group1_c.png',
            'd' => 'group1_d.png',
            'e' => 'group1_e.png',
        ];

        // Pilihan GRUP 2 (a=persegi panjang, b=segitiga, c=kotak, d=segitiga besar, e=jajargenjang)
        $group2_options = [
            'a' => 'group2_a.png',
            'b' => 'group2_b.png',
            'c' => 'group2_c.png',
            'd' => 'group2_d.png',
            'e' => 'group2_e.png',
        ];

        $questions = [

            // --- GRUP 1: Soal 117–128 ---
            ['question' => '117.png', 'options' => $group1_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '118.png', 'options' => $group1_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '119.png', 'options' => $group1_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '120.png', 'options' => $group1_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '121.png', 'options' => $group1_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '122.png', 'options' => $group1_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '123.png', 'options' => $group1_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '124.png', 'options' => $group1_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '125.png', 'options' => $group1_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '126.png', 'options' => $group1_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '127.png', 'options' => $group1_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '128.png', 'options' => $group1_options, 'answer' => 'b'], // ← sesuaikan jawaban

            // --- GRUP 2: Soal 129–136 ---
            ['question' => '129.png', 'options' => $group2_options, 'answer' => 'a'], // ← sesuaikan jawaban
            ['question' => '130.png', 'options' => $group2_options, 'answer' => 'c'], // ← sesuaikan jawaban
            ['question' => '131.png', 'options' => $group2_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '132.png', 'options' => $group2_options, 'answer' => 'e'], // ← sesuaikan jawaban
            ['question' => '133.png', 'options' => $group2_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '134.png', 'options' => $group2_options, 'answer' => 'd'], // ← sesuaikan jawaban
            ['question' => '135.png', 'options' => $group2_options, 'answer' => 'b'], // ← sesuaikan jawaban
            ['question' => '136.png', 'options' => $group2_options, 'answer' => 'e'], // ← sesuaikan jawaban
        ];

        // ============================================================
        // Insert ke database
        // ============================================================
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
