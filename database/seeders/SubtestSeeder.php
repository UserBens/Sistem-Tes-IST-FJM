<?php

namespace Database\Seeders;

use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubtestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtest::create([
            'subtest_name' => 'Subtest 01',
            'duration' => 10,
            'order' => 1,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 01
                (Soal-soal No. 01 – 20)

                Soal-soal 01-20 terdiri atas kalimat-kalimat.
                Pada setiap kalimat satu kata hilang dan disediakan 5 (lima) kata pilihan sebagai penggantinya. Pilihan kata yang tepat dapat menyempurnakan kalimat itu!

                Contoh 01
                Seekor kuda mempunyai kesamaan terbanyak dengan seekor …..

                a) kucing
                b) bajing
                c) keledai
                d) lembu
                e) anjing

                Jawaban yang benar ialah: c) keledai.
                Oleh karena itu, pada lembar jawaban di belakang contoh 01, huruf c harus dicoret.

                Contoh berikutnya:

                Lawannya 'harapan' ialah …..

                a) duka
                b) putus asa
                c) sengsara
                d) cinta
                e) benci

                Jawabannya ialah: b) putus asa.
                Maka huruf b yang seharusnya dicoret.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 02',
            'duration' => 10,
            'order' => 2,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 02
                (Soal-soal No. 21 – 40)

                Ditentukan 5 kata.
                Pada 4 dari 5 kata itu terdapat suatu kesamaan.
                Carilah kata yang kelima yang tidak memiliki kesamaan dengan keempat kata itu.

                Contoh 02

                a) meja
                b) kursi
                c) burung
                d) lemari
                e) tempat tidur

                a), b), d), dan e) ialah perabot rumah (meubel).
                c) burung bukan perabot rumah atau tidak memiliki kesamaan dengan keempat kata itu.

                Oleh karena itu, pada lembar jawaban di belakang contoh 02, huruf c harus dicoret.

                Contoh berikutnya:

                a) duduk
                b) berbaring
                c) berdiri
                d) berjalan
                e) berjongkok

                Pada a), b), c) dan e) orang berada dalam keadaan tidak bergerak,
                sedangkan d) orang dalam keadaan bergerak.

                Maka jawaban yang benar ialah: d) berjalan.
                Oleh karena itu huruf d yang seharusnya dicoret.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 03',
            'duration' => 10,
            'order' => 3,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 03
                (Soal-soal No. 41 – 60)

                Ditentukan 3 (tiga) kata.
                Antara kata pertama dan kata kedua terdapat suatu hubungan tertentu.
                Antara kata ketiga dan salah satu diantara lima kata pilihan harus pula terdapat hubungan yang sama itu.
                Carilah kata itu.

                Contoh 03

                Hutan : pohon = tembok : ?

                a) batu bata
                b) rumah
                c) semen
                d) putih
                e) dinding

                Hubungan antara hutan dan pohon ialah bahwa hutan terdiri atas pohon-pohon.
                Maka hubungan antara tembok dan salah satu kata pilihan ialah bahwa tembok terdiri atas batu-batu bata.

                Oleh karena itu, pada lembar jawaban di belakang contoh 03, huruf a harus dicoret.

                Contoh berikutnya:

                Gelap : terang = basah : ?

                a) hujan
                b) hari
                c) lembab
                d) angin
                e) kering

                Gelap ialah lawannya dari terang,
                maka untuk basah lawannya ialah kering.

                Maka jawaban yang benar ialah: e) kering.
                Oleh karena itu huruf e yang seharusnya dicoret.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 04',
            'duration' => 10,
            'order' => 4,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 04
                (Soal-soal No. 61 – 76)

                Ditentukan dua kata.
                Carilah satu perkataan yang meliputi pengertian kedua kata tadi.
                Tulislah perkataan itu pada lembar jawaban di belakang nomor soal yang sesuai.

                Contoh 04

                Ayam – itik

                Perkataan 'burung' dapat meliputi pengertian kedua kata itu.
                Maka jawabannya ialah 'burung'.

                Oleh karena itu, pada lembar jawaban di belakang contoh 04, harus ditulis 'burung'.

                burung

                Contoh berikutnya:

                Gaun – celana

                Pada contoh ini jawabannya ialah 'pakaian'.
                Maka 'pakaian' yang seharusnya ditulis.

                Carilah selalu perkataan yang tepat yang dapat meliputi pengertian kedua kata itu.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 05',
            'duration' => 10,
            'order' => 5,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 05
                (Soal-soal No. 77 – 96)

                Persoalan berikutnya ialah soal-soal hitungan.

                Contoh 05

                Sebatang pensil harganya 25 rupiah. Berapakah harga 3 batang?

                Jawabannya ialah: 75

                Perhatikan cara menjawab di atas lembar jawaban!

                Pada lembar jawaban lihatlah pada kolom 05.
                Kolom ini terdiri atas angka-angka 1 sampai 9 dan 0.

                Untuk menunjukkan jawaban suatu soal, maka coretlah angka-angka yang terdapat di dalam jawaban itu.
                Keurutan angka jawaban tidak perlu dihiraukan.

                Pada contoh 05 jawaban ialah 75.
                Oleh karena itu, pada lembar jawaban di belakang contoh 05, angka 7 dan 5 harus dicoret.

                05)  1  2  3  4  5  6  7  8  9  0


                Contoh lain:

                Dengan sepeda Husin dapat mencapai 15 km dalam waktu 1 jam.
                Berapa km-kah yang dapat ia capai dalam waktu 4 jam?

                Jawabannya ialah: 60

                Maka untuk menunjukkan jawaban itu angka 6 dan 0 yang seharusnya dicoret.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 06',
            'duration' => 10,
            'order' => 6,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 06
                (Soal-soal No. 97 – 116)

                Pada persoalan berikut akan diberikan deret angka.
                Setiap deret tersusun menurut suatu aturan yang tertentu dan dapat dilanjutkan menurut aturan itu.

                Carilah untuk setiap deret angka berikutnya dan coretlah jawaban saudara pada lembar jawaban di belakang nomor soal yang sesuai.

                Contoh 06

                2  4  6  8  10  12  14  ?

                Pada deret ini angka berikutnya selalu didapat jika angka di depannya ditambah dengan 2.
                Maka jawabannya ialah 16.

                Oleh karena itu, pada lembar jawaban di belakang contoh 06, angka 1 dan 6 harus dicoret.

                06)  1  2  3  4  5  6  7  8  9  0

                Contoh berikutnya:

                9  7  10  8  11  9  12  ?

                Pada deret ini berganti-ganti harus dikurangi dengan 2 dan setelah itu ditambah dengan 3.

                Jawaban contoh ini ialah: 10.

                Maka dari itu angka 1 dan 0 seharusnya yang dicoret.

                Kadang-kadang pada beberapa soal harus pula dikalikan atau dibagi.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 07',
            'duration' => 20,
            'order' => 7,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 07
                (Soal-soal No. 117 – 136)

                Pada persoalan berikutnya, setiap soal memperlihatkan suatu bentuk tertentu
                yang terpotong menjadi beberapa bagian.

                Carilah di antara bentuk-bentuk yang ditentukan (a, b, c, d, e) bentuk yang
                dibangun dengan cara menyusun potongan-potongan itu sedemikian rupa,
                sehingga tidak ada kelebihan sudut atau ruang di antaranya.

                Carilah bentuk-bentuk itu dan coretlah huruf yang menunjukkan bentuk tadi
                pada lembar jawaban di belakang nomor soal yang sesuai.

                Contoh 07

                Jika potongan-potongan pada contoh 07 di atas disusun (digabungkan),
                maka akan menghasilkan bentuk a.

                Oleh karena itu, pada lembar jawaban di belakang contoh 07,
                huruf a harus dicoret.

                Contoh berikutnya:
                Potongan-potongan contoh kedua setelah disusun menghasilkan bentuk e.
                Contoh ketiga menjadi bentuk b.
                Contoh keempat ialah bentuk d.
                ",

            'instruction_image' => 'gambar-subtest7.png'
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 08',
            'duration' => 20,
            'order' => 8,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 08
                (Soal-soal No. 137 – 156)

                Ditentukan 5 (lima) buah kubus a, b, c, d, e. Pada tiap-tiap kubus terdapat enam tanda
                yang berlainan pada setiap sisinya. Tiga dari tanda itu dapat dilihat.

                Kubus-kubus yang ditentukan itu (a, b, c, d, e) ialah kubus-kubus yang berbeda,
                artinya kubus-kubus itu dapat mempunyai tanda-tanda yang sama, akan tetapi
                susunannya berlainan.

                Setiap soal memperlihatkan salah satu kubus yang ditentukan di dalam kedudukan
                yang berbeda. Carilah kubus yang dimaksudkan itu dan coretkanlah jawaban saudara
                pada lembar jawaban di belakang nomor yang sesuai.

                Kubus itu dapat diputar, dapat digulingkan atau dapat diputar dan digulingkan
                dalam pikiran.

                Contoh 08

                Contoh ini memperlihatkan kubus a dengan kedudukan yang berbeda.

                Mendapatkannya adalah dengan cara menggulingkan lebih dulu kubus itu ke kiri
                satu kali dan kemudian diputar ke kiri satu kali, sehingga sisi kubus yang
                bertanda dua segi empat hitam terletak di depan, seperti kubus a.

                Oleh karena itu, pada lembar jawaban di belakang contoh 08, huruf a harus dicoret.

                Contoh berikutnya:

                Contoh kedua adalah kubus e.

                Cara mendapatkannya adalah dengan digulingkan ke kiri satu kali dan diputar
                ke kanan satu kali, sehingga sisi kubus yang bertanda garis silang terletak
                di depan, seperti kubus e.

                Contoh ketiga adalah kubus b.

                Cara mendapatkannya dengan menggulingkan ke kiri satu kali, sehingga dasar
                kubus yang tadinya tidak terlihat memunculkan tanda baru (dalam hal ini adalah
                tanda dua segi empat hitam) dan tanda silang pada sisi atas kubus itu menjadi
                tidak terlihat lagi.

                Contoh keempat menunjukkan kubus c.
                Contoh kelima adalah kubus d.
                ",

            'instruction_image' => 'gambar-subtest8.png'
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 09',
            'duration' => 10,
            'order' => 9,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 09
                (Soal-soal No. 157 – 176)

                Pada persoalan berikutnya, terdapat sejumlah pertanyaan mengenai
                kata-kata yang telah saudara hafalkan tadi.

                Coretlah jawaban saudara pada lembaran jawaban di belakang nomor
                soal yang sesuai.

                Contoh 09

                Kata yang mempunyai huruf permulaan – Q – adalah suatu …….

                a) bunga
                b) perkakas
                c) burung
                d) kesenian
                e) binatang

                Quintet adalah termasuk dalam jenis kesenian, sehingga
                jawaban yang benar adalah d).

                Oleh karena itu, pada lembar jawaban di belakang contoh 09
                huruf d harus dicoret.

                Contoh berikutnya:

                Kata yang mempunyai huruf pertama – Z – adalah suatu …….

                a) bunga
                b) perkakas
                c) burung
                d) kesenian
                e) binatang

                Jawabannya adalah e, karena Zebra termasuk dalam jenis binatang.
                ",
            'instruction_image' => null
        ]);
    }
}
