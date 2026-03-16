<?php

namespace Database\Seeders;

use App\Models\Subtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubtestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtest::create([
            'subtest_name' => 'Subtest 01',
            'code' => 'SE',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 1,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 01
                (Soal-soal No. 01 – 20)

                Soal-soal 01-20 terdiri atas kalimat-kalimat.
                Pada setiap kalimat satu kata hilang dan disediakan 5 (lima) kata pilihan sebagai penggantinya. Pilihan kata yang tepat dapat menyempurnakan kalimat itu!

                Contoh 01
                Seekor kuda mempunyai kesamaan terbanyak dengan seekor …..

                - kucing
                - bajing
                - keledai
                - lembu
                - anjing

                Jawaban yang benar ialah: keledai.
                Oleh karena itu, pada pilhan jawaban di bawah contoh 01, kata keledai harus dipilih.

                Contoh berikutnya:

                Lawannya 'harapan' ialah …..

                - duka
                - putus asa
                - sengsara
                - cinta
                - benci

                Jawabannya ialah: putus asa.
                Maka kata putus asa yang seharusnya dipilih.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 02',
            'code' => 'WA',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 2,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 02
                (Soal-soal No. 21 – 40)

                Ditentukan 5 kata.
                Pada 4 dari 5 kata itu terdapat suatu kesamaan.
                Carilah kata yang kelima yang tidak memiliki kesamaan dengan keempat kata itu.

                Contoh 02

                - meja
                - kursi
                - burung
                - lemari
                - tempat tidur

                meja, kursi, lemari, dan tempat tidur ialah perabot rumah (meubel).
                burung bukan perabot rumah atau tidak memiliki kesamaan dengan keempat kata itu.

                Oleh karena itu, pada pilihan jawaban di bawah contoh 02, kata butung harus dipilih.

                Contoh berikutnya:

                - duduk
                - berbaring
                - berdiri
                - berjalan
                - berjongkok

                Pada pilhan jawaban duduk, berbaring, berdiri dan berjongkok orang berada dalam keadaan tidak bergerak,
                sedangkan berjalan orang dalam keadaan bergerak.

                Maka jawaban yang benar ialah: berjalan.
                Oleh karena itu kata berjalan yang seharusnya dipilih.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 03',
            'code' => 'AN',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
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

                - batu bata
                - rumah
                - semen
                - putih
                - dinding

                Hubungan antara hutan dan pohon ialah bahwa hutan terdiri atas pohon-pohon.
                Maka hubungan antara tembok dan salah satu kata pilihan ialah bahwa tembok terdiri atas batu-batu bata.

                Oleh karena itu, pada pilihan jawaban di bawah contoh 03, kata batu bata harus dipilih.

                Contoh berikutnya:

                Gelap : terang = basah : ?

                - hujan
                - hari
                - lembab
                - angin
                - kering

                Gelap ialah lawannya dari terang,
                maka untuk basah lawannya ialah kering.

                Maka jawaban yang benar ialah: kering.
                Oleh karena itu kata kering yang seharusnya dipilih.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 04',
            'code' => 'GE',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 4,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 04
                (Soal-soal No. 61 – 76)

                Ditentukan dua kata.
                Carilah satu perkataan yang meliputi pengertian kedua kata tadi.
                ketiklah perkataan itu pada inputan text area jawaban di bawah soal.

                Contoh 04

                Ayam – itik

                Perkataan 'burung' dapat meliputi pengertian kedua kata itu.
                Maka jawabannya ialah 'burung'.

                Oleh karena itu, pada inputan text area jawaban di bawah soal contoh 04, harus diketik 'burung'.

                burung

                Contoh berikutnya:

                Gaun – celana

                Pada contoh ini jawabannya ialah 'pakaian'.
                Maka 'pakaian' yang seharusnya diketik pada inputan text area jawaban dibawah soal itu.

                Carilah selalu perkataan yang tepat yang dapat meliputi pengertian kedua kata itu.
                "
        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 05',
            'code' => 'RA',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 5,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 05
                (Soal-soal No. 77 – 96)

                Persoalan berikutnya ialah soal-soal hitungan.

                Contoh 05

                Sebatang pensil harganya 25 rupiah. Berapakah harga 3 batang?

                Jawabannya ialah: 75

                Perhatikan cara menjawab di piilhan angka yang sudah disediakan dibawah soal!

                Pada pemilihan jawaban lihatlah pada kolom 05.
                Kolom ini terdiri atas angka-angka 1 sampai 9 dan 0.

                Untuk menunjukkan jawaban suatu soal, maka pilhlah angka-angka yang terdapat di dalam jawaban itu.
                Keurutan angka jawaban perlu diperhatikan.

                Pada contoh 05 jawaban ialah 75.
                Oleh karena itu, pada pemilihan jawaban di bawah soal contoh 05, angka 7 dan 5 harus dipilih.

                05)  1  2  3  4  5  6  7  8  9  0


                Contoh lain:

                Dengan sepeda Husin dapat mencapai 15 km dalam waktu 1 jam.
                Berapa km-kah yang dapat ia capai dalam waktu 4 jam?

                Jawabannya ialah: 60

                Maka untuk menunjukkan jawaban itu angka 6 dan 0 yang seharusnya dipilih.
                ",

            'instruction_image' => 'contoh-inputan-jawaban05 dan 06.png'

        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 06',
            'code' => 'ZR',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 6,
            'instruction' => "
                PETUNJUK DAN CONTOH UNTUK KELOMPOK SOAL 06
                (Soal-soal No. 97 – 116)

                Pada persoalan berikut akan diberikan deret angka.
                Setiap deret tersusun menurut suatu aturan yang tertentu dan dapat dilanjutkan menurut aturan itu.

                Carilah untuk setiap deret angka berikutnya dan pilhlah angka-angka yang sesuai dengan jawaban anda.

                Contoh 06

                2  4  6  8  10  12  14  ?

                Pada deret ini angka berikutnya selalu didapat jika angka di depannya ditambah dengan 2.
                Maka jawabannya ialah 16.

                Oleh karena itu, pada pilhan angka jawaban di bawah soal contoh 06, angka 1 dan 6 harus dipilih.

                06)  1  2  3  4  5  6  7  8  9  0

                Contoh berikutnya:

                9  7  10  8  11  9  12  ?

                Pada deret ini berganti-ganti harus dikurangi dengan 2 dan setelah itu ditambah dengan 3.

                Jawaban contoh ini ialah: 10.

                Maka dari itu angka 1 dan 0 seharusnya yang dipilih.

                Kadang-kadang pada beberapa soal harus pula dikalikan atau dibagi.
                ",

            'instruction_image' => 'contoh-inputan-jawaban05 dan 06.png'

        ]);

        Subtest::create([
            'subtest_name' => 'Subtest 07',
            'code' => 'FA',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
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
            'code' => 'WU',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
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
            'code' => 'ME',          // ← tambahkan ini
            'instruction_duration' => 0,
            'question_duration' => 1,
            'order' => 9,
            'instruction' => "
                Hafalkan kata-kata di bawah ini selama 3 menit.

                BUNGA      : SOKA, LARAT, FLAMBOYAN, YASMIN, DAHLIA
                PERKAKAS   : WAJAN, JARUM, KIKIR, CANGKUL, PALU
                BURUNG     : ITIK, ELANG, WALET, TEKUKUR, NURI
                KESENIAN   : QUINTET, ARCA, OPERA, UKIRAN, GAMELAN
                BINATANG   : RUSA, MUSANG, BERUANG, HARIMAU, ZEBRA

                BUNGA	    : SOKA, LARAT, FLAMBOYAN, YASMIN, DAHLIA 
                PERKAKAS	: WAJAN, JARUM, KIKIR, CANGKUL, PALU 
                BURUNG  	: ITIK, ELANG, WALET, TERUKUR, NURI 
                KESENIAN	: QUATET, ARCA, OPERA, UKIRAN, GAMELAN 
                BINATANG	: RUSA, MUSANG, BERUANG, HARIMAU, ZEBRA

                BUNGA	    : SOKA, LARAT, FLAMBOYAN, YASMIN, DAHLIA 
                PERKAKAS	: WAJAN, JARUM, KIKIR, CANGKUL, PALU 
                BURUNG	    : ITIK, ELANG, WALET, TERUKUR, NURI 
                KESENIAN	: QUATET, ARCA, OPERA, UKIRAN, GAMELAN 
                BINATANG	: RUSA, MUSANG, BERUANG, HARIMAU, ZEBRA

                BUNGA	    : SOKA, LARAT, FLAMBOYAN, YASMIN, DAHLIA 
                PERKAKAS	: WAJAN, JARUM, KIKIR, CANGKUL, PALU 
                BURUNG	    : ITIK, ELANG, WALET, TERUKUR, NURI 
                KESENIAN	: QUATET, ARCA, OPERA, UKIRAN, GAMELAN 
                BINATANG	: RUSA, MUSANG, BERUANG, HARIMAU, ZEBRA
                -----------------------------------------------------

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
