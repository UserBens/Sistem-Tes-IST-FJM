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
            '61. mawar – melati',
            '62. mata – telinga',
            '63. gula – intan',
            '64. hujan – salju',
            '65. pengantar surat – telepon',
            '66. kamera – kacamata',
            '67. lambung – usus',
            '68. banyak – sedikit',
            '69. telur – benih',
            '70. bendera – lencana',
            '71. rumput – gajah',
            '72. ember – kantong',
            '73. awal – akhir',
            '74. kikir – boros',
            '75. penawaran – permintaan',
            '76. atas – bawah'
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
