<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Question1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 1)->first();

        $questions = [

            [
                'question' => '1. Pengaruh seseorang terhadap orang lain seharusnya bergantung pada …..',
                'options' => ['kekuasaan', 'bujukan', 'kekayaan', 'keberanian', 'kewibawaan']
            ],
            [
                'question' => '2. Lawannya “hemat” ialah ……………',
                'options' => ['murah', 'kikir', 'boros', 'bernilai', 'kaya']
            ],
            [
                'question' => '3. Tidak termasuk cuaca',
                'options' => ['angin puyuh', 'halilintar', 'salju', 'gempa bumi', 'kabut']
            ],
            [
                'question' => '4. Lawannya “setia” ialah ……………',
                'options' => ['cinta', 'benci', 'persahabatan', 'khianat', 'permusuhan']
            ],
            [
                'question' => '5. Seekor kuda selalu mempunyai ……………',
                'options' => ['kandang', 'ladam', 'pelana', 'kuku', 'surai']
            ],
            [
                'question' => '6. Seorang paman lebih tua dari kemenakannya.',
                'options' => ['jarang', 'biasanya', 'selalu', 'tidak pernah', 'kadang-kadang']
            ],
            [
                'question' => '7. Pada jumlah yang sama, nilai kalori yang tertinggi terdapat pada ……………',
                'options' => ['ikan', 'daging', 'lemak', 'tahu', 'sayuran']
            ],
            [
                'question' => '8. Pada suatu pertandingan selalu terdapat ……………',
                'options' => ['lawan', 'wasit', 'penonton', 'sorak', 'kemenangan']
            ],
            [
                'question' => '9. Suatu pernyataan yang belum dipastikan dikatakan sebagai pernyataan yang …..',
                'options' => ['paradoks', 'tergesa-gesa', 'mempunyai arti rangkap', 'menyesatkan', 'hipotesis']
            ],
            [
                'question' => '10. Pada sepatu selalu terdapat ……………',
                'options' => ['kulit', 'sol', 'tali sepatu', 'gesper', 'lidah']
            ],
            [
                'question' => '11. Suatu ... tidak menyangkut persoalan pencegahan kecelakaan.',
                'options' => ['lampu lalu lintas', 'kacamata pelindung', 'kotak PPPK', 'tanda peringatan', 'palang kereta api']
            ],
            [
                'question' => '12. Mata uang logam Rp 50 tahun 1991, garis tengahnya ialah ... mm.',
                'options' => ['17', '29', '25', '20', '15']
            ],
            [
                'question' => '13. Seseorang yang bersikap menyangsikan setiap kemajuan ialah seorang yang …..',
                'options' => ['demokratis', 'radikal', 'liberal', 'konservatif', 'anarkis']
            ],
            [
                'question' => '14. Lawannya “tidak pernah” ialah ……………',
                'options' => ['sering', 'kadang-kadang', 'jarang', 'kerap kali', 'selalu']
            ],
            [
                'question' => '15. Jarak antara Jakarta – Surabaya kira-kira ... Km',
                'options' => ['650', '1000', '800', '600', '950']
            ],
            [
                'question' => '16. Untuk dapat membuat nada yang rendah dan mendalam, kita memerlukan banyak ….',
                'options' => ['kekuatan', 'peranan', 'ayunan', 'berat', 'suara']
            ],
            [
                'question' => '17. Ayah lebih berpengalaman dari pada anaknya',
                'options' => ['selalu', 'biasanya', 'jauh', 'jarang', 'pada dasarnya']
            ],
            [
                'question' => '18. Diantara kota-kota berikut ini, maka kota ... letaknya paling selatan.',
                'options' => ['Jakarta', 'Bandung', 'Cirebon', 'Semarang', 'Surabaya']
            ],
            [
                'question' => '19. Jika kita mengetahui jumlah presentase nomor-nomor lotere yang tidak menang, maka kita dapat menghitung …..',
                'options' => ['jumlah nomor yang menang', 'pajak lotere', 'kemungkinan menang', 'jumlah pengikut', 'tinggi keuntungan']
            ],
            [
                'question' => '20. Seorang anak yang berumur 10 tahun tingginya rata-rata ... cm',
                'options' => ['150', '130', '110', '105', '115']
            ],

        ];

        foreach ($questions as $q) {

            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'single_choice',
                'weight' => 1
            ]);

            foreach ($q['options'] as $option) {
                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option
                ]);
            }
        }
    }
}
