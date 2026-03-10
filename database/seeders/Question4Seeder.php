<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
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

            [
                'question' => '61. Mawar – Melati',
                'answers' => [
                    ['text' => 'bunga', 'score' => 2],
                    ['text' => 'kembang', 'score' => 2],
                    ['text' => 'perdu', 'score' => 2],

                    ['text' => 'tumbuh-tumbuhan', 'score' => 1],
                    ['text' => 'tangkai', 'score' => 1],
                    ['text' => 'harum', 'score' => 1],
                ]
            ],

            [
                'question' => '62. Mata – Telinga',
                'answers' => [
                    ['text' => 'alat indera', 'score' => 2],
                    ['text' => 'indera', 'score' => 2],
                    ['text' => 'panca indera', 'score' => 2],

                    ['text' => 'organ', 'score' => 1],
                    ['text' => 'alat tubuh', 'score' => 1],
                ]
            ],

            [
                'question' => '63. Gula – Intan',
                'answers' => [
                    ['text' => 'hablur', 'score' => 2],
                    ['text' => 'kristal', 'score' => 2],
                    ['text' => 'Zat Arang', 'score' => 2],

                    ['text' => 'berkilauan', 'score' => 1],
                    ['text' => 'mengkilat', 'score' => 1],
                    ['text' => 'bening', 'score' => 1],
                ]
            ],

            [
                'question' => '64. Salju – Hujan',
                'answers' => [
                    ['text' => 'Musim', 'score' => 2],
                    ['text' => 'Cuaca', 'score' => 1],
                ]
            ],
            [
                'question' => '65. Pengantar Surat – Telepon',
                'answers' => [
                    ['text' => 'Pembawa Berita', 'score' => 2],
                    ['text' => 'Alat Perhubungan', 'score' => 2],

                    ['text' => 'Telekomunikasi', 'score' => 1],
                    ['text' => 'Perhubungan', 'score' => 1],
                    ['text' => 'Komunikasi', 'score' => 1],
                ]
            ],
            [
                'question' => '66. Kamera – Kacamata',
                'answers' => [
                    ['text' => 'Alat Optik', 'score' => 2],
                    ['text' => 'Optik', 'score' => 2],

                    ['text' => 'lensa', 'score' => 1],
                ]
            ],
            [
                'question' => '67. Lambung – Usus',
                'answers' => [
                    ['text' => 'Alat Pencernaan', 'score' => 2],

                    ['text' => 'Jalan Makanan', 'score' => 1],
                    ['text' => 'Perut', 'score' => 1],
                    ['text' => 'Isi Perut', 'score' => 1],
                    ['text' => 'Pencernaan Makanan', 'score' => 1],
                ]
            ],
            [
                'question' => '68. Banyak – Sedikit',
                'answers' => [
                    ['text' => 'Jumlah', 'score' => 2],
                    ['text' => 'Kuantitas', 'score' => 2],
                    ['text' => 'Penyebut Jumlah', 'score' => 2],
                    ['text' => 'Penyerta Jumlah', 'score' => 2],

                    ['text' => 'Mengukur', 'score' => 1],
                    ['text' => 'Ukuran', 'score' => 1],
                ]
            ],
            [
                'question' => '69. Telur – Benih',
                'answers' => [
                    ['text' => 'Bibit', 'score' => 2],
                    ['text' => 'Bakal', 'score' => 2],
                    ['text' => 'Embrio', 'score' => 2],
                    ['text' => 'Alat Pembiak', 'score' => 2],
                    ['text' => 'Permulaan Kehidupan', 'score' => 2],

                    ['text' => 'Sel', 'score' => 1],
                    ['text' => 'Pembiakan', 'score' => 1],
                ]
            ],
            [
                'question' => '70. Bendera – Lencana',
                'answers' => [
                    ['text' => 'Simbol', 'score' => 2],
                    ['text' => 'Lambang', 'score' => 2],
                    ['text' => 'Tanda', 'score' => 2],

                    ['text' => 'Nama', 'score' => 1],
                    ['text' => 'Tanda Pengenal', 'score' => 1],
                ]
            ],
            [
                'question' => '71. Rumput – Gajah',
                'answers' => [
                    ['text' => 'Makhluk', 'score' => 2],
                    ['text' => 'Organism', 'score' => 2],
                    ['text' => 'Makhluk Hidup', 'score' => 2],

                    ['text' => 'Tumbuh', 'score' => 1],
                    ['text' => 'Ilmu Hayat', 'score' => 1],
                    ['text' => 'Biologi', 'score' => 1],
                ]
            ],
            [
                'question' => '72. Ember – Kantong',
                'answers' => [
                    ['text' => 'Wadah', 'score' => 2],
                    ['text' => 'Tempat Pengisi', 'score' => 2],
                    ['text' => 'Tempat Penyimpanan', 'score' => 2],

                    ['text' => 'Alat', 'score' => 1],
                    ['text' => 'Tempat Sesuatu', 'score' => 1],
                    ['text' => 'Tempat', 'score' => 1],
                    ['text' => 'Benda', 'score' => 1],
                ]
            ],
            [
                'question' => '73. Awal – Akhir',
                'answers' => [
                    ['text' => 'Pengertian Waktu', 'score' => 2],
                    ['text' => 'Batas', 'score' => 2],

                    ['text' => 'Waktu', 'score' => 1],
                    ['text' => 'Masa', 'score' => 1],
                    ['text' => 'Saat', 'score' => 1],
                    ['text' => 'Lamanya', 'score' => 1],
                ]
            ],
            [
                'question' => '74. Kikir – Boros',
                'answers' => [
                    ['text' => 'Kata Sifat', 'score' => 2],
                    ['text' => 'Watak', 'score' => 2],
                    ['text' => 'Sifat Karakter', 'score' => 2],

                    ['text' => 'Sifat', 'score' => 1],
                ]
            ],
            [
                'question' => '75. Penawaran – Permintaan',
                'answers' => [
                    ['text' => 'Regulator Harga', 'score' => 2],
                    ['text' => 'Pengertian Ekonomi', 'score' => 2],

                    ['text' => 'Dagang', 'score' => 1],
                    ['text' => 'Pembelian', 'score' => 1],
                    ['text' => 'Penjualan', 'score' => 1],
                    ['text' => 'Niaga', 'score' => 1],
                    ['text' => 'Jual Beli', 'score' => 1],
                ]
            ],
            [
                'question' => '76. Atas – Bawah',
                'answers' => [
                    ['text' => 'Pengertian Ruang', 'score' => 2],
                    ['text' => 'Penyebut Ruang', 'score' => 2],

                    ['text' => 'Arah', 'score' => 1],
                    ['text' => 'Letak', 'score' => 1],
                    ['text' => 'Penentuan Daerah', 'score' => 1],
                    ['text' => 'Tempat', 'score' => 1],
                    ['text' => 'Ruang', 'score' => 1],
                    ['text' => 'Penunjuk Tempat', 'score' => 1],
                ]
            ],

        ];

        foreach ($questions as $q) {

            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'essay',
                'weight' => 2
            ]);

            foreach ($q['answers'] as $ans) {

                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => strtolower($ans['text']),
                    'answer_score' => $ans['score']
                ]);
            }
        }
    }
}
