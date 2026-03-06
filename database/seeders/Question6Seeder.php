<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Question6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 6)->first();

        $questions = [
            '6 9 12 15 18 21 24 ?',
            '15 16 18 19 21 22 24 ?',
            '19 18 22 21 25 24 28 ?',
            '16 12 17 13 18 14 19 ?',
            '2 4 8 10 20 22 44 ?',
            '15 13 16 12 17 11 18 ?',
            '25 22 11 33 30 15 45 ?',
            '49 51 54 27 9 11 14 ?',
            '2 3 1 3 4 2 4 ?',
            '19 17 20 16 21 15 22 ?',
            '94 92 46 44 22 20 10 ?',
            '5 8 9 8 11 12 11 ?',
            '12 15 19 23 28 33 39 ?',
            '7 5 10 7 21 17 68 ?',
            '11 15 18 9 13 16 8 ?',
            '3 8 15 24 35 48 63 ?',
            '4 5 7 4 8 13 7 ?',
            '8 5 15 18 6 3 9 ?',
            '15 6 18 10 30 23 69 ?',
            '5 35 28 4 11 77 70 ?',
        ];

        foreach ($questions as $q) {
            Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q,
                'question_type' => 'essay', // jawaban bebas angka
                'weight' => 1,
            ]);
        }
    }
}
