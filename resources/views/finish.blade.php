<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Selesai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-2xl">

        <div class="bg-white rounded-2xl shadow-xl p-8">

            <!-- Header -->
            <div class="text-center mb-8">

                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Tes Selesai
                </h1>

                <p class="text-gray-600 mt-2">
                    Terima kasih sudah mengerjakan tes ini
                </p>

                <p class="mt-3 font-semibold text-gray-700">
                    {{ $participant->name ?? 'Peserta' }}
                </p>

            </div>


            @if ($istResult)

                <!-- IQ BOX -->
                <div class="mb-6 p-6 bg-indigo-50 border border-indigo-200 rounded-xl text-center">

                    <div class="text-sm text-indigo-700 font-medium">
                        Intelligence Quotient (IQ)
                    </div>

                    <div class="text-4xl font-bold text-indigo-700 mt-2">
                        {{ $istResult->iq ?? '—' }}
                    </div>

                    <div class="text-sm text-gray-600 mt-1">
                        {{ $istResult->iq_category ?? '—' }}
                    </div>

                </div>


                <!-- Dominasi -->
                <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-center">

                    <div class="text-sm text-blue-700 font-medium">
                        Dominasi Kemampuan
                    </div>

                    <div class="text-lg font-semibold text-blue-800 mt-1">
                        {{ $istResult->dominasi ?? '—' }}
                    </div>

                </div>


                <!-- Judul -->
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Skor Per Subtest
                </h2>


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
                @endphp


                <!-- Tabel -->
                <div class="overflow-x-auto">

                    <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">

                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="p-3 text-left">Subtest</th>
                                <th class="p-3 text-center">RW</th>
                                <th class="p-3 text-center">SW</th>
                                <th class="p-3 text-center">Kategori</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @foreach ($subtests as $code => $data)
                                <tr class="bg-white">

                                    <td class="p-3 font-semibold text-gray-700">
                                        {{ $code }}
                                    </td>

                                    <td class="p-3 text-center">
                                        {{ $data['rw'] ?? 0 }}
                                    </td>

                                    <td class="p-3 text-center">
                                        {{ $data['sw'] ?? '—' }}
                                    </td>

                                    <td class="p-3 text-center text-gray-600">
                                        {{ $data['cat'] ?? '—' }}
                                    </td>

                                </tr>
                            @endforeach


                            <!-- TOTAL -->
                            <tr class="bg-gray-50 font-semibold">
                                <td class="p-3">JML</td>
                                <td class="p-3 text-center">{{ $istResult->total_rw }}</td>
                                <td class="p-3 text-center">{{ $istResult->total_sw ?? '—' }}</td>
                                <td class="p-3 text-center">—</td>
                            </tr>


                            <!-- IQ -->
                            <tr class="bg-indigo-50 font-semibold">
                                <td class="p-3">IQ</td>
                                <td class="p-3 text-center">{{ $istResult->iq ?? '—' }}</td>
                                <td class="p-3 text-center">—</td>
                                <td class="p-3 text-center">{{ $istResult->iq_category ?? '—' }}</td>
                            </tr>


                            <!-- Dominasi -->
                            <tr class="bg-blue-50 font-semibold">
                                <td class="p-3">Dominasi</td>
                                <td colspan="3" class="p-3 text-center">
                                    {{ $istResult->dominasi ?? '—' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            @else
                <div class="text-center text-gray-500 py-8">
                    Hasil belum tersedia. Silakan hubungi administrator.
                </div>

            @endif


            <!-- Tombol -->
            <div class="flex flex-col sm:flex-row gap-3 mt-8">

                <button onclick="window.print()"
                    class="flex-1 bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    🖨️ Cetak / Simpan PDF
                </button>

                <a href="{{ route('participant.create') }}"
                    class="flex-1 bg-green-600 text-white py-3 text-center rounded-lg font-semibold hover:bg-green-700 transition">
                    ✅ Selesai
                </a>

            </div>


            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf

                <button
                    class="w-full bg-gray-200 text-gray-700 py-3 rounded-lg font-medium hover:bg-gray-300 transition">

                    Kembali ke Halaman Login

                </button>

            </form>


        </div>

    </div>

</body>

</html>
