<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Selesai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-95 min-h-screen flex items-center justify-center p-4">
    {{-- <div class="w-full max-w-2xl"> --}}

    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-lg text-center">

        <div class="flex justify-center mb-4">
            <div class="bg-green-100 p-4 rounded-full">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-3">
            Tes Selesai
        </h1>

        <p class="text-gray-700 mb-2 font-semibold">
            {{ $participant->name ?? 'Peserta' }}
        </p>

        <p class="text-gray-600 mb-6">
            Jawaban Anda sudah tersimpan.<br>
            Terima kasih sudah mengerjakan tes ini.<br>
            Semoga beruntung!!
        </p>

        <table class="table-auto w-full border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="border p-2">Subtest</th>
                    <th class="border p-2">Score</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($attempts as $attempt)
                    <tr class="text-center">
                        <td class="border p-2">
                            {{ $attempt->subtest->subtest_name }}
                        </td>

                        <td class="border p-2 font-semibold text-indigo-600">
                            {{ $attempt->score }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="container">
            @if ($istResult)

                {{-- IQ BOX --}}
                <div class="iq-box">
                    <div class="iq-label">Intelligence Quotient (IQ)</div>
                    <div class="iq-value">{{ $istResult->iq ?? '—' }}</div>
                    <div class="iq-category">{{ $istResult->iq_category ?? '—' }}</div>
                </div>

                {{-- DOMINASI --}}
                <div class="dominasi-box">
                    <div class="dominasi-label">Dominasi Kemampuan:</div>
                    <div class="dominasi-value">{{ $istResult->dominasi ?? '—' }}</div>
                </div>

                {{-- TABEL HASIL SUBTEST --}}
                <div class="section-title">Skor Per Subtest</div>

                @php
                    $subtests = [
                        'SE' => ['rw' => $istResult->rw_se, 'sw' => $istResult->sw_se, 'cat' => $istResult->cat_se],
                        'WA' => ['rw' => $istResult->rw_wa, 'sw' => $istResult->sw_wa, 'cat' => $istResult->cat_wa],
                        'AN' => ['rw' => $istResult->rw_an, 'sw' => $istResult->sw_an, 'cat' => $istResult->cat_an],
                        'GE' => ['rw' => $istResult->rw_ge, 'sw' => $istResult->sw_ge, 'cat' => $istResult->cat_ge],
                        'ME' => ['rw' => $istResult->rw_me, 'sw' => $istResult->sw_me, 'cat' => $istResult->cat_me],
                        'RA' => ['rw' => $istResult->rw_ra, 'sw' => $istResult->sw_ra, 'cat' => $istResult->cat_ra],
                        'ZR' => ['rw' => $istResult->rw_zr, 'sw' => $istResult->sw_zr, 'cat' => $istResult->cat_zr],
                        'FA' => ['rw' => $istResult->rw_fa, 'sw' => $istResult->sw_fa, 'cat' => $istResult->cat_fa],
                        'WU' => ['rw' => $istResult->rw_wu, 'sw' => $istResult->sw_wu, 'cat' => $istResult->cat_wu],
                    ];

                    $badgeMap = [
                        'Sangat Tinggi' => 'badge-sangat-tinggi',
                        'Tinggi' => 'badge-tinggi',
                        'Cukup' => 'badge-cukup',
                        'Sedang' => 'badge-sedang',
                        'Rendah' => 'badge-rendah',
                        'Sangat Rendah' => 'badge-sangat-rendah',
                        'Defektif' => 'badge-defektif',
                    ];
                @endphp

                <table>
                    <thead>
                        <tr>
                            <th>Subtest</th>
                            <th>RW</th>
                            <th>SW</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subtests as $code => $data)
                            <tr>
                                <td>{{ $code }}</td>
                                <td>{{ $data['rw'] ?? 0 }}</td>
                                <td>{{ $data['sw'] ?? '—' }}</td>
                                <td>
                                    @if ($data['cat'] && $data['cat'] !== '-')
                                        <span class="badge {{ $badgeMap[$data['cat']] ?? 'badge-default' }}">
                                            {{ $data['cat'] }}
                                        </span>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- BARIS TOTAL --}}
                        <tr class="total-row">
                            <td>JML</td>
                            <td>{{ $istResult->total_rw }}</td>
                            <td>{{ $istResult->total_sw ?? '—' }}</td>
                            <td>—</td>
                        </tr>

                        {{-- BARIS IQ --}}
                        <tr class="iq-row">
                            <td>IQ</td>
                            <td>{{ $istResult->iq ?? '—' }}</td>
                            <td>—</td>
                            <td>{{ $istResult->iq_category ?? '—' }}</td>
                        </tr>

                        {{-- BARIS DOMINASI --}}
                        <tr class="dominasi-row">
                            <td>Dominasi</td>
                            <td colspan="3">{{ $istResult->dominasi ?? '—' }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div style="text-align:center; color:#718096; padding: 40px 0;">
                    <p>Hasil belum tersedia. Silakan hubungi administrator.</p>
                </div>
            @endif

            {{-- TOMBOL AKSI --}}
            <div class="actions">
                <button class="btn btn-primary" onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
                <a href="{{ route('participant.create') }}" class="btn btn-success">✅ Selesai</a>
            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold
               hover:bg-indigo-700 transition">

                Kembali ke Halaman Login

            </button>
        </form>

    </div>
</body>

</html>
