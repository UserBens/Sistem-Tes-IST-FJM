<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IstSwNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ist_sw_norms')->truncate();

        // ===========================================================
        // DATA NORMA 18 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataAge18 = [
            // RW  SE   WA   AN   GE    RA   ZR   FA   WU   ME
            [0,   72,  64,  76,  75,   75,  79,  74,  74,  73],
            [1,   75,  66,  79,  76.5, 78,  81,  76,  76,  76],
            [2,   78,  69,  81,  78,   81,  84,  79,  80,  78],
            [3,   81,  73,  83,  80,   84,  86,  82,  83,  80],
            [4,   83,  77,  86,  82,   86,  88,  85,  86,  83],
            [5,   86,  81,  89,  83.5, 89,  91,  88,  89,  85],
            [6,   89,  85,  91,  85,   92,  93,  90,  92,  88],
            [7,   92,  89,  94,  87,   95,  95,  93,  94,  90],
            [8,   94,  92,  96,  89,   98,  98,  96,  97,  92],
            [9,   97,  96,  99,  91,   101, 100, 99,  100, 95],
            [10,  100, 100, 101, 93,   104, 102, 101, 103, 97],
            [11,  103, 104, 104, 94,   107, 105, 104, 106, 99],
            [12,  106, 108, 106, 95,   109, 107, 107, 109, 102],
            [13,  108, 112, 109, 96.5, 112, 110, 110, 112, 104],
            [14,  111, 115, 112, 98,   115, 112, 113, 115, 106],
            [15,  114, 119, 114, 100,  118, 114, 115, 118, 109],
            [16,  117, 123, 117, 102,  121, 117, 118, 121, 111],
            [17,  119, 127, 119, 103.5, 124, 119, 121, 123, 113],
            [18,  122, 131, 122, 105,  126, 122, 124, 126, 116],
            [19,  125, 135, 125, 106.5, 129, 124, 127, 129, 118],
            [20,  128, 138, 127, 108,  132, 126, 130, 132, 121],

            [21,  null, null, null, 109.5, null, null, null, null, null],
            [22,  null, null, null, 111,   null, null, null, null, null],
            [23,  null, null, null, 113,   null, null, null, null, null],
            [24,  null, null, null, 115,   null, null, null, null, null],
            [25,  null, null, null, 116.5, null, null, null, null, null],
            [26,  null, null, null, 118,   null, null, null, null, null],
            [27,  null, null, null, 119.5, null, null, null, null, null],
            [28,  null, null, null, 121,   null, null, null, null, null],
            [29,  null, null, null, 123,   null, null, null, null, null],
            [30,  null, null, null, 125,   null, null, null, null, null],
            [31,  null, null, null, 126.5, null, null, null, null, null],
            [32,  null, null, null, 128,   null, null, null, null, null],
        ];

        $this->insertSwData('age18', $dataAge18);

        // ===========================================================
        // DATA NORMA <= 20 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataLte20 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   68,  61,  74,  72,  74,  78,  74,  74,  70],
            [1,   70,  64,  76,  74,  77,  80,  77,  77,  73],
            [2,   73,  66,  79,  76,  80,  82,  79,  80,  76],
            [3,   76,  70,  81,  78,  83,  85,  82,  83,  78],
            [4,   79,  74,  84,  79,  86,  87,  85,  86,  81],
            [5,   82,  78,  86,  81,  89,  90,  87,  89,  83],
            [6,   85,  81,  89,  83,  91,  92,  90,  91,  86],
            [7,   87,  85,  91,  85,  93,  94,  92,  94,  89],
            [8,   90,  89,  93,  86,  97,  96,  95,  97,  91],
            [9,   93,  93,  97,  88,  100, 99,  98,  100, 93],
            [10,  96,  97,  99,  89,  103, 101, 100, 103, 96],
            [11,  99,  101, 102, 91,  106, 104, 103, 106, 98],
            [12,  101, 105, 104, 92,  109, 106, 106, 109, 101],
            [13,  104, 109, 107, 94,  111, 108, 109, 111, 103],
            [14,  107, 112, 109, 96,  114, 111, 111, 114, 106],
            [15,  110, 116, 112, 98,  117, 113, 114, 117, 108],
            [16,  113, 120, 115, 100, 120, 115, 117, 120, 111],
            [17,  116, 124, 117, 101, 123, 118, 120, 123, 113],
            [18,  119, 127, 120, 102, 126, 120, 122, 126, 116],
            [19,  122, 132, 122, 104, 128, 123, 125, 128, 118],
            [20,  124, 135, 125, 106, 131, 125, 128, 131, 121],

            [21,  null, null, null, 108, null, null, null, null, null],
            [22,  null, null, null, 109, null, null, null, null, null],
            [23,  null, null, null, 111, null, null, null, null, null],
            [24,  null, null, null, 112, null, null, null, null, null],
            [25,  null, null, null, 114, null, null, null, null, null],
            [26,  null, null, null, 116, null, null, null, null, null],
            [27,  null, null, null, 118, null, null, null, null, null],
            [28,  null, null, null, 119, null, null, null, null, null],
            [29,  null, null, null, 121, null, null, null, null, null],
            [30,  null, null, null, 122, null, null, null, null, null],
            [31,  null, null, null, 124, null, null, null, null, null],
            [32,  null, null, null, 126, null, null, null, null, null],
        ];

        $this->insertSwData('lte20', $dataLte20);

        // ===========================================================
        // DATA NORMA <= 24 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataLte24 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   66,  63,  75,  74,  75,  80,  75,  75,  74],
            [1,   68,  66,  78,  76,  77,  82,  78,  78,  77],
            [2,   71,  69,  80,  77,  80,  84,  80,  80,  79],
            [3,   74,  73,  83,  79,  83,  86,  83,  83,  81],
            [4,   78,  76,  85,  80,  86,  89,  85,  86,  84],
            [5,   80,  80,  88,  82,  88,  91,  88,  89,  86],
            [6,   83,  83,  90,  83,  91,  93,  91,  92,  88],
            [7,   86,  87,  92,  85,  94,  95,  93,  95,  91],
            [8,   89,  91,  95,  86,  97,  97,  96,  97,  93],
            [9,   92,  95,  97,  88,  99,  99,  98,  100, 95],
            [10,  95,  98,  100, 89,  102, 102, 101, 103, 98],
            [11,  98,  102, 102, 91,  105, 104, 103, 106, 100],
            [12,  101, 106, 104, 92,  107, 106, 106, 108, 102],
            [13,  104, 109, 107, 94,  110, 108, 108, 111, 105],
            [14,  107, 113, 109, 95,  113, 110, 111, 114, 107],
            [15,  110, 116, 111, 97,  115, 112, 113, 117, 109],
            [16,  113, 120, 114, 98,  118, 115, 116, 120, 112],
            [17,  116, 124, 116, 100, 121, 117, 119, 122, 114],
            [18,  119, 128, 119, 102, 123, 119, 121, 125, 116],
            [19,  123, 131, 121, 104, 126, 121, 124, 128, 119],
            [20,  126, 135, 123, 105, 129, 124, 127, 131, 121],
            [21,  null, null, null, 107, null, null, null, null, null],
            [22,  null, null, null, 108, null, null, null, null, null],
            [23,  null, null, null, 110, null, null, null, null, null],
            [24,  null, null, null, 111, null, null, null, null, null],
            [25,  null, null, null, 113, null, null, null, null, null],
            [26,  null, null, null, 114, null, null, null, null, null],
            [27,  null, null, null, 116, null, null, null, null, null],
            [28,  null, null, null, 117, null, null, null, null, null],
            [29,  null, null, null, 119, null, null, null, null, null],
            [30,  null, null, null, 120, null, null, null, null, null],
            [31,  null, null, null, 122, null, null, null, null, null],
            [32,  null, null, null, 123, null, null, null, null, null],
        ];

        $this->insertSwData('lte24', $dataLte24);

        // // ===========================================================
        // // DATA NORMA <= 28 TAHUN
        // // (Masukkan data norma usia 25-28 tahun di sini)
        // // Format sama: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // // CATATAN: Ganti nilai null dengan data norma yang sebenarnya
        // // ===========================================================
        $dataLte28 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   65,  65,  77,  73,  72,  77,  74,  74,  77],
            [1,   67,  69,  79,  75,  76,  80,  77,  77,  80],
            [2,   70,  73,  81,  76,  80,  82,  80,  80,  82],
            [3,   73,  75,  84,  78,  82,  85,  82,  83,  84],
            [4,   76,  79,  86,  80,  84,  87,  85,  85,  86],
            [5,   79,  82,  88,  82,  87,  90,  88,  88,  89],
            [6,   82,  85,  91,  83,  90,  92,  90,  91,  91],
            [7,   86,  89,  93,  85,  93,  94,  93,  94,  93],
            [8,   89,  92,  95,  87,  96,  97,  96,  97,  95],
            [9,   92,  95,  98,  89,  98,  99,  99,  100, 98],
            [10,  95,  99,  100, 90,  101, 101, 101, 103, 100],
            [11,  98,  102, 102, 91,  104, 104, 104, 106, 102],
            [12,  101, 105, 105, 92,  107, 106, 107, 109, 104],
            [13,  104, 109, 107, 94,  110, 109, 109, 112, 107],
            [14,  108, 112, 109, 96,  112, 111, 112, 115, 109],
            [15,  111, 115, 112, 98,  115, 113, 115, 118, 111],
            [16,  114, 119, 114, 99,  118, 116, 118, 121, 113],
            [17,  117, 122, 116, 101, 120, 118, 120, 123, 116],
            [18,  120, 125, 119, 102, 123, 120, 123, 126, 118],
            [19,  123, 129, 121, 104, 126, 123, 126, 130, 120],
            [20,  126, 132, 123, 105, 130, 127, 130, 133, 122],
            [21,  null, null, null, 107, null, null, null, null, null],
            [22,  null, null, null, 108, null, null, null, null, null],
            [23,  null, null, null, 110, null, null, null, null, null],
            [24,  null, null, null, 112, null, null, null, null, null],
            [25,  null, null, null, 114, null, null, null, null, null],
            [26,  null, null, null, 115, null, null, null, null, null],
            [27,  null, null, null, 117, null, null, null, null, null],
            [28,  null, null, null, 118, null, null, null, null, null],
            [29,  null, null, null, 120, null, null, null, null, null],
            [30,  null, null, null, 122, null, null, null, null, null],
            [31,  null, null, null, 124, null, null, null, null, null],
            [32,  null, null, null, 125, null, null, null, null, null],
        ];

        $this->insertSwData('lte28', $dataLte28);

        // // ===========================================================
        // // DATA NORMA <= 33 TAHUN
        // // (Masukkan data norma usia 29-33 tahun di sini)
        // // ===========================================================
        $dataLte33 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   65,  65,  78,  75,  75,  80,  75,  76,  78],
            [1,   68,  69,  80,  77,  77,  82,  77,  79,  80],
            [2,   71,  72,  82,  78,  80,  84,  80,  81,  83],
            [3,   74,  75,  84,  80,  83,  86,  83,  84,  85],
            [4,   78,  79,  86,  81,  85,  89,  85,  87,  87],
            [5,   81,  82,  88,  83,  88,  91,  88,  90,  89],
            [6,   82,  85,  90,  84,  91,  93,  91,  92,  92],
            [7,   86,  89,  93,  86,  93,  95,  93,  95,  94],
            [8,   89,  92,  96,  87,  96,  97,  95,  98,  97],
            [9,   92,  96,  98,  89,  99,  100, 99,  101, 99],
            [10,  93,  100, 100, 90,  102, 102, 101, 104, 101],
            [11,  98,  103, 102, 92,  104, 104, 103, 106, 103],
            [12,  101, 106, 104, 94,  107, 106, 106, 109, 106],
            [13,  104, 110, 107, 96,  110, 108, 109, 112, 108],
            [14,  107, 113, 109, 97,  112, 111, 111, 115, 110],
            [15,  110, 117, 111, 98,  115, 113, 115, 118, 112],
            [16,  113, 120, 113, 99,  118, 115, 117, 120, 114],
            [17,  116, 123, 116, 101, 121, 117, 120, 123, 117],
            [18,  119, 127, 118, 102, 124, 120, 123, 126, 119],
            [19,  122, 130, 120, 103, 126, 122, 127, 129, 122],
            [20,  126, 134, 122, 104, 129, 124, 128, 131, 124],

            [21,  null, null, null, 106, null, null, null, null, null],
            [22,  null, null, null, 107, null, null, null, null, null],
            [23,  null, null, null, 109, null, null, null, null, null],
            [24,  null, null, null, 110, null, null, null, null, null],
            [25,  null, null, null, 112, null, null, null, null, null],
            [26,  null, null, null, 113, null, null, null, null, null],
            [27,  null, null, null, 115, null, null, null, null, null],
            [28,  null, null, null, 116, null, null, null, null, null],
            [29,  null, null, null, 118, null, null, null, null, null],
            [30,  null, null, null, 120, null, null, null, null, null],
            [31,  null, null, null, 121, null, null, null, null, null],
            [32,  null, null, null, 122, null, null, null, null, null],
        ];

        $this->insertSwData('lte33', $dataLte33);

        // ===========================================================
        // DATA NORMA <= 39 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataLte39 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   68,  69,  79,  76,  75,  79,  77,  77,  81],
            [1,   71,  72,  81,  78,  77,  81,  80,  80,  83],
            [2,   75,  75,  83,  79,  80,  83,  82,  82,  86],
            [3,   77,  78,  86,  81,  83,  86,  85,  85,  88],
            [4,   80,  81,  89,  82,  86,  88,  87,  87,  90],
            [5,   83,  85,  91,  84,  88,  90,  90,  90,  92],
            [6,   86,  88,  93,  85,  91,  92,  93,  93,  94],
            [7,   89,  91,  95,  86,  94,  95,  95,  96,  97],
            [8,   92,  94,  97,  87,  97,  97,  98,  98,  99],
            [9,   95,  97,  100, 89,  99,  99,  101, 101, 101],
            [10,  98,  101, 102, 90,  102, 102, 103, 104, 103],
            [11,  101, 104, 104, 92,  105, 104, 105, 106, 106],
            [12,  104, 107, 106, 93,  109, 106, 108, 109, 108],
            [13,  107, 110, 108, 95,  111, 108, 110, 112, 110],
            [14,  110, 114, 111, 96,  113, 111, 113, 115, 112],
            [15,  113, 117, 113, 98,  116, 113, 115, 117, 115],
            [16,  116, 120, 115, 99,  119, 115, 118, 120, 117],
            [17,  119, 123, 117, 101, 122, 117, 120, 123, 120],
            [18,  121, 126, 120, 102, 124, 120, 123, 125, 122],
            [19,  124, 130, 122, 104, 127, 122, 126, 128, 124],
            [20,  128, 133, 124, 105, 130, 124, 128, 131, 127],

            [21,  null, null, null, 107, null, null, null, null, null],
            [22,  null, null, null, 108, null, null, null, null, null],
            [23,  null, null, null, 110, null, null, null, null, null],
            [24,  null, null, null, 111, null, null, null, null, null],
            [25,  null, null, null, 113, null, null, null, null, null],
            [26,  null, null, null, 114, null, null, null, null, null],
            [27,  null, null, null, 116, null, null, null, null, null],
            [28,  null, null, null, 117, null, null, null, null, null],
            [29,  null, null, null, 119, null, null, null, null, null],
            [30,  null, null, null, 120, null, null, null, null, null],
            [31,  null, null, null, 122, null, null, null, null, null],
            [32,  null, null, null, 124, null, null, null, null, null],
        ];

        $this->insertSwData('lte39', $dataLte39);

        // ===========================================================
        // DATA NORMA <= 45 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataLte45 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   73,  73,  81,  76,  77,  80,  79,  78,  82],
            [1,   75,  76,  83,  78,  79,  82,  81,  81,  84],
            [2,   78,  80,  85,  79,  82,  84,  84,  84,  87],
            [3,   81,  83,  88,  81,  85,  86,  86,  86,  89],
            [4,   84,  85,  90,  82,  88,  89,  89,  89,  91],
            [5,   87,  89,  92,  84,  90,  91,  91,  91,  93],
            [6,   90,  92,  94,  85,  93,  93,  93,  95,  96],
            [7,   92,  95,  97,  87,  96,  95,  97,  97,  98],
            [8,   95,  98,  99,  88,  98,  98,  99,  100, 100],
            [9,   98,  101, 101, 90,  101, 100, 102, 103, 102],
            [10,  101, 104, 103, 91,  104, 102, 104, 105, 104],
            [11,  104, 108, 106, 93,  106, 104, 107, 108, 107],
            [12,  107, 111, 108, 94,  109, 107, 109, 111, 109],
            [13,  110, 114, 110, 96,  112, 109, 112, 114, 111],
            [14,  113, 117, 112, 97,  115, 111, 115, 116, 113],
            [15,  115, 120, 114, 99,  117, 113, 117, 119, 116],
            [16,  118, 123, 117, 100, 120, 115, 120, 122, 118],
            [17,  121, 126, 119, 102, 123, 118, 122, 124, 120],
            [18,  124, 130, 121, 103, 125, 120, 125, 127, 122],
            [19,  127, 133, 123, 105, 128, 122, 128, 130, 125],
            [20,  130, 136, 126, 106, 131, 125, 130, 133, 127],

            [21,  null, null, null, 108, null, null, null, null, null],
            [22,  null, null, null, 109, null, null, null, null, null],
            [23,  null, null, null, 111, null, null, null, null, null],
            [24,  null, null, null, 112, null, null, null, null, null],
            [25,  null, null, null, 114, null, null, null, null, null],
            [26,  null, null, null, 115, null, null, null, null, null],
            [27,  null, null, null, 117, null, null, null, null, null],
            [28,  null, null, null, 118, null, null, null, null, null],
            [29,  null, null, null, 120, null, null, null, null, null],
            [30,  null, null, null, 121, null, null, null, null, null],
            [31,  null, null, null, 123, null, null, null, null, null],
            [32,  null, null, null, 124, null, null, null, null, null],
        ];

        $this->insertSwData('lte45', $dataLte45);

        // ===========================================================
        // DATA NORMA > 45 TAHUN
        // Format: [RW, SE, WA, AN, GE, RA, ZR, FA, WU, ME]
        // ===========================================================
        $dataGt45 = [
            // RW  SE   WA   AN   GE   RA   ZR   FA   WU   ME
            [0,   75,  75,  82,  77,  77,  81,  80,  78,  84],
            [1,   78,  78,  85,  79,  79,  83,  82,  81,  86],
            [2,   81,  81,  87,  80,  81,  85,  85,  84,  89],
            [3,   84,  84,  89,  81,  84,  88,  88,  87,  91],
            [4,   87,  87,  91,  82,  88,  90,  91,  89,  93],
            [5,   90,  90,  94,  84,  91,  92,  93,  92,  95],
            [6,   93,  94,  96,  85,  94,  94,  96,  95,  98],
            [7,   96,  97,  98,  87,  97,  97,  98,  98,  100],
            [8,   99,  100, 101, 88,  99,  99,  101, 101, 102],
            [9,   102, 103, 103, 90,  102, 101, 104, 103, 105],
            [10,  104, 106, 105, 91,  104, 103, 106, 106, 107],
            [11,  107, 110, 107, 93,  107, 105, 109, 109, 109],
            [12,  110, 113, 110, 94,  110, 108, 112, 112, 111],
            [13,  113, 116, 112, 96,  113, 110, 115, 115, 114],
            [14,  116, 119, 114, 97,  116, 112, 117, 117, 116],
            [15,  119, 123, 116, 99,  119, 114, 119, 120, 118],
            [16,  122, 126, 119, 100, 121, 116, 122, 123, 120],
            [17,  125, 129, 121, 102, 125, 118, 125, 125, 123],
            [18,  128, 132, 123, 103, 128, 120, 128, 129, 125],
            [19,  131, 135, 126, 105, 131, 123, 131, 131, 127],
            [20,  134, 139, 129, 106, 134, 125, 133, 134, 130],

            [21,  null, null, null, 108, null, null, null, null, null],
            [22,  null, null, null, 109, null, null, null, null, null],
            [23,  null, null, null, 110, null, null, null, null, null],
            [24,  null, null, null, 111, null, null, null, null, null],
            [25,  null, null, null, 113, null, null, null, null, null],
            [26,  null, null, null, 115, null, null, null, null, null],
            [27,  null, null, null, 117, null, null, null, null, null],
            [28,  null, null, null, 118, null, null, null, null, null],
            [29,  null, null, null, 120, null, null, null, null, null],
            [30,  null, null, null, 121, null, null, null, null, null],
            [31,  null, null, null, 123, null, null, null, null, null],
            [32,  null, null, null, 125, null, null, null, null, null],
        ];

        $this->insertSwData('gt45', $dataGt45);

        $this->command->info('IST SW Norms seeded successfully!');
    }

    /**
     * Insert data SW ke database.
     * @param string $ageGroup Kelompok umur
     * @param array $data Array [rw, se, wa, an, ge, ra, zr, fa, wu, me]
     */
    private function insertSwData(string $ageGroup, array $data): void
    {
        $subtests = ['SE', 'WA', 'AN', 'GE', 'RA', 'ZR', 'FA', 'WU', 'ME'];
        $rows = [];
        $now = now();

        foreach ($data as $row) {
            $rw = $row[0];

            foreach ($subtests as $index => $subtest) {
                $sw = $row[$index + 1];

                if ($sw !== null) {
                    $rows[] = [
                        'age_group'    => $ageGroup,
                        'subtest_name' => $subtest,
                        'rw'           => $rw,
                        'sw'           => $sw,
                        'created_at'   => $now,
                        'updated_at'   => $now,
                    ];
                }
            }
        }

        DB::table('ist_sw_norms')->insert($rows);
    }
}
