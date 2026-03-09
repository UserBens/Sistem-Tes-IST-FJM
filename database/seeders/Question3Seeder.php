<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Question3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtest = Subtest::where('order', 3)->first();

        $questions = [

            [
                'question' => '41. Menemukan : menghilangkan = Mengingat : ?',
                'options' => [
                    ['text' => 'menghapal', 'is_correct' => false],
                    ['text' => 'mengenai', 'is_correct' => false],
                    ['text' => 'melupakan', 'is_correct' => true], // C
                    ['text' => 'berpikir', 'is_correct' => false],
                    ['text' => 'memimpikan', 'is_correct' => false],
                ]
            ],

            [
                'question' => '42. Bunga : jambangan = Burung : ?',
                'options' => [
                    ['text' => 'sarang', 'is_correct' => false],
                    ['text' => 'langit', 'is_correct' => false],
                    ['text' => 'pagar', 'is_correct' => false],
                    ['text' => 'pohon', 'is_correct' => true], // D
                    ['text' => 'sangkar', 'is_correct' => false],
                ]
            ],

            [
                'question' => '43. Kereta api : rel = Otobis : ?',
                'options' => [
                    ['text' => 'roda', 'is_correct' => false],
                    ['text' => 'poros', 'is_correct' => false],
                    ['text' => 'ban', 'is_correct' => false],
                    ['text' => 'jalan raya', 'is_correct' => true], // D
                    ['text' => 'kecepatan', 'is_correct' => false],
                ]
            ],

            [
                'question' => '44. Perak : emas = Cincin : ?',
                'options' => [
                    ['text' => 'arloji', 'is_correct' => false],
                    ['text' => 'berlian', 'is_correct' => false],
                    ['text' => 'permata', 'is_correct' => false],
                    ['text' => 'gelang', 'is_correct' => true], // D
                    ['text' => 'platina', 'is_correct' => false],
                ]
            ],

            [
                'question' => '45. Lingkaran : bola = Bujur sangkar : ?',
                'options' => [
                    ['text' => 'bentuk', 'is_correct' => false],
                    ['text' => 'gambar', 'is_correct' => false],
                    ['text' => 'segi empat', 'is_correct' => false],
                    ['text' => 'kubus', 'is_correct' => true], // D
                    ['text' => 'piramida', 'is_correct' => false],
                ]
            ],

            [
                'question' => '46. Saran : kepustakaan = Merundingkan : ?',
                'options' => [
                    ['text' => 'menawarkan', 'is_correct' => false],
                    ['text' => 'menentukan', 'is_correct' => false],
                    ['text' => 'menilai', 'is_correct' => false],
                    ['text' => 'menimbang', 'is_correct' => true], // D
                    ['text' => 'merenungkan', 'is_correct' => false],
                ]
            ],

            [
                'question' => '47. Lidah : asam = Hidung : ?',
                'options' => [
                    ['text' => 'mencium', 'is_correct' => false],
                    ['text' => 'bernapas', 'is_correct' => false],
                    ['text' => 'mengecap', 'is_correct' => false],
                    ['text' => 'tengik', 'is_correct' => true], // D
                    ['text' => 'asin', 'is_correct' => false],
                ]
            ],

            [
                'question' => '48. Darah : pembuluh = Air : ?',
                'options' => [
                    ['text' => 'pintu air', 'is_correct' => false],
                    ['text' => 'sungai', 'is_correct' => true], // B
                    ['text' => 'talang', 'is_correct' => false],
                    ['text' => 'hujan', 'is_correct' => false],
                    ['text' => 'ember', 'is_correct' => false],
                ]
            ],

            [
                'question' => '49. Saraf : penyalur = Pupil : ?',
                'options' => [
                    ['text' => 'penyinaran', 'is_correct' => false],
                    ['text' => 'mata', 'is_correct' => false],
                    ['text' => 'melihat', 'is_correct' => true], // C
                    ['text' => 'cahaya', 'is_correct' => false],
                    ['text' => 'pelindung', 'is_correct' => false],
                ]
            ],

            [
                'question' => '50. Pengantar surat : pengantar telegram = Pandai besi : ?',
                'options' => [
                    ['text' => 'palu godam', 'is_correct' => false],
                    ['text' => 'pedagang besi', 'is_correct' => false],
                    ['text' => 'api', 'is_correct' => false],
                    ['text' => 'tukang emas', 'is_correct' => false],
                    ['text' => 'besi tempa', 'is_correct' => true], // E
                ]
            ],

            [
                'question' => '51. Buta : warna = Tuli : ?',
                'options' => [
                    ['text' => 'pendengaran', 'is_correct' => false],
                    ['text' => 'mendengar', 'is_correct' => true], // B
                    ['text' => 'nada', 'is_correct' => false],
                    ['text' => 'kata', 'is_correct' => false],
                    ['text' => 'telinga', 'is_correct' => false],
                ]
            ],

            [
                'question' => '52. Makanan : bumbu = Ceramah : ?',
                'options' => [
                    ['text' => 'penghinaan', 'is_correct' => false],
                    ['text' => 'pidato', 'is_correct' => false],
                    ['text' => 'kelakar', 'is_correct' => false],
                    ['text' => 'kesan', 'is_correct' => false],
                    ['text' => 'ayat', 'is_correct' => true], // E
                ]
            ],

            [
                'question' => '53. Marah : emosi = Duka cita : ?',
                'options' => [
                    ['text' => 'suka cita', 'is_correct' => false],
                    ['text' => 'sakit hati', 'is_correct' => false],
                    ['text' => 'suasana hati', 'is_correct' => false],
                    ['text' => 'sedih', 'is_correct' => true], // D
                    ['text' => 'rindu', 'is_correct' => false],
                ]
            ],

            [
                'question' => '54. Mantel : jubah = wool : ?',
                'options' => [
                    ['text' => 'bahan sandang', 'is_correct' => false],
                    ['text' => 'domba', 'is_correct' => false],
                    ['text' => 'sutra', 'is_correct' => true], // C
                    ['text' => 'jas', 'is_correct' => false],
                    ['text' => 'tekstil', 'is_correct' => false],
                ]
            ],

            [
                'question' => '55. Ketinggian puncak : tekanan udara = ketinggian nada : ?',
                'options' => [
                    ['text' => 'garpu tala', 'is_correct' => false],
                    ['text' => 'sopran', 'is_correct' => true], // B
                    ['text' => 'nyanyian', 'is_correct' => false],
                    ['text' => 'panjang senar', 'is_correct' => false],
                    ['text' => 'suara', 'is_correct' => false],
                ]
            ],

            [
                'question' => '56. Negara : revolusi = Hidup : ?',
                'options' => [
                    ['text' => 'biologi', 'is_correct' => true], // A
                    ['text' => 'keturunan', 'is_correct' => false],
                    ['text' => 'mutasi', 'is_correct' => false],
                    ['text' => 'seleksi', 'is_correct' => false],
                    ['text' => 'ilmu hewan', 'is_correct' => false],
                ]
            ],

            [
                'question' => '57. Kekurangan : penemuan = Panas : ?',
                'options' => [
                    ['text' => 'haus', 'is_correct' => false],
                    ['text' => 'khatulistiwa', 'is_correct' => false],
                    ['text' => 'es', 'is_correct' => false],
                    ['text' => 'matahari', 'is_correct' => true], // D
                    ['text' => 'dingin', 'is_correct' => false],
                ]
            ],

            [
                'question' => '58. Kayu : diketam = Besi : ?',
                'options' => [
                    ['text' => 'dipalu', 'is_correct' => false],
                    ['text' => 'digergaji', 'is_correct' => false],
                    ['text' => 'dituang', 'is_correct' => false],
                    ['text' => 'dikikir', 'is_correct' => false],
                    ['text' => 'ditempa', 'is_correct' => true], // E
                ]
            ],

            [
                'question' => '59. Olahragawan : lembing = Cendekiawan : ?',
                'options' => [
                    ['text' => 'perpustakaan', 'is_correct' => false],
                    ['text' => 'penelitian', 'is_correct' => true], // B
                    ['text' => 'karya', 'is_correct' => false],
                    ['text' => 'studi', 'is_correct' => false],
                    ['text' => 'mikroskop', 'is_correct' => false],
                ]
            ],

            [
                'question' => '60. Keledai : kuda pacuan = Pembakaran : ?',
                'options' => [
                    ['text' => 'pemadam api', 'is_correct' => false],
                    ['text' => 'obor', 'is_correct' => false],
                    ['text' => 'letupan', 'is_correct' => false],
                    ['text' => 'korek api', 'is_correct' => true], // D
                    ['text' => 'lautan api', 'is_correct' => false],
                ]
            ],

        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question' => $q['question'],
                'question_type' => 'single_choice',
                'weight' => 1
            ]);

            foreach ($q['options'] as $opt) {
                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $opt['text'],
                    'is_correct' => $opt['is_correct']
                ]);
            }
        }
    }
}
