<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-95 min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-sm text-gray-500 mt-0.5">Sistem Informasi Hasil Tes IST</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition text-sm font-medium">
                Logout
            </button>
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <div class="flex items-center justify-between mb-5">
            <div>
                <h2 class="text-base font-bold text-gray-800">Data Hasil Tes Peserta</h2>
                <p class="text-xs text-gray-400 mt-0.5">Daftar seluruh peserta yang telah menyelesaikan tes</p>
            </div>
        </div>

        <!-- Filter -->
        <form method="GET" class="grid md:grid-cols-4 gap-3 mb-5">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama peserta..."
                class="px-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">

            <select name="iq_category"
                class="px-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 text-gray-600">
                <option value="">Semua Kategori</option>
                <option value="Very Superior" {{ request('iq_category') == 'Very Superior' ? 'selected' : '' }}>Very
                    Superior</option>
                <option value="Superior" {{ request('iq_category') == 'Superior' ? 'selected' : '' }}>Superior</option>
                <option value="High Average" {{ request('iq_category') == 'High Average' ? 'selected' : '' }}>High
                    Average</option>
                <option value="Average" {{ request('iq_category') == 'Average' ? 'selected' : '' }}>Average</option>
                <option value="Below Average" {{ request('iq_category') == 'Below Average' ? 'selected' : '' }}>Below
                    Average</option>
            </select>

            <input type="date" name="tanggal_tes" value="{{ request('tanggal_tes') }}"
                class="px-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 text-gray-600">

            <div class="flex gap-2">
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-2 bg-indigo-600 text-white rounded-xl px-4 py-2 text-sm font-medium hover:bg-indigo-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                    </svg>
                    Filter
                </button>
                @if (request('search') || request('iq_category') || request('tanggal_tes'))
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center justify-center px-3 py-2 border border-gray-200 rounded-xl text-sm text-gray-500 hover:bg-gray-50 transition">
                        ✕
                    </a>
                @endif
            </div>
        </form>

        <!-- Tabel -->
        <div class="overflow-x-auto rounded-xl border border-gray-300">
            <table class="w-full text-sm text-left">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3 font-semibold">No</th>
                        <th class="px-4 py-3 font-semibold">Nama</th>
                        <th class="px-4 py-3 font-semibold">Total RW</th>
                        <th class="px-4 py-3 font-semibold">Total SW</th>
                        <th class="px-4 py-3 font-semibold">IQ</th>
                        <th class="px-4 py-3 font-semibold">Kategori</th>
                        <th class="px-4 py-3 font-semibold">Dominasi</th>
                        <th class="px-4 py-3 font-semibold">Tanggal Tes</th>
                        <th class="px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($results as $index => $item)
                        <tr class="hover:bg-indigo-50/40 transition-colors">
                            <td class="px-4 py-3 text-gray-500">{{ $results->firstItem() + $index }}</td>
                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $item->participant->name ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->total_rw }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $item->total_sw }}</td>
                            <td class="px-4 py-3">
                                <span class="font-bold text-indigo-600 text-base">{{ $item->iq }}</span>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $cat = $item->iq_category;
                                    $color = match ($cat) {
                                        'Very Superior' => 'bg-purple-100 text-purple-700',
                                        'Superior' => 'bg-blue-100 text-blue-700',
                                        'High Average' => 'bg-indigo-100 text-indigo-700',
                                        'Average' => 'bg-green-100 text-green-700',
                                        'Below Average' => 'bg-rose-100 text-rose-600',
                                        default => 'bg-gray-100 text-gray-600',
                                    };
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $color }}">
                                    {{ $cat }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $item->dominasi == 'Eksak' ? 'bg-amber-100 text-amber-700' : 'bg-teal-100 text-teal-700' }}">
                                    {{ $item->dominasi }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500 text-xs">
                                {{ $item->participant->test_finished_at
                                    ? \Carbon\Carbon::parse($item->participant->test_finished_at)->translatedFormat('d F Y H:i')
                                    : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                <button onclick='openModal(@json($item))'
                                    class="flex items-center gap-1.5 bg-indigo-500 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-indigo-600 transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-12 text-gray-400">
                                <svg class="w-10 h-10 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-sm">Belum ada data hasil tes</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $results->links() }}
        </div>

    </div>

    <!-- MODAL -->
    <div id="modalDetail"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4 overflow-y-auto">

        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl my-auto mx-auto">

            <!-- HEADER MODAL -->
            <div class="flex items-center justify-between px-6 pt-5 pb-4 border-b">
                <h2 class="text-lg font-bold text-gray-800">Detail Hasil Tes IQ Peserta</h2>
                <button onclick="closeModal()"
                    class="text-gray-400 hover:text-red-500 transition text-2xl leading-none">
                    &times;
                </button>
            </div>

            <!-- ISI DINAMIS -->
            <div id="modalContent" class="px-6 py-5"></div>

        </div>
    </div>

    <script>
        function formatTanggal(dateString) {
            if (!dateString) return '—';

            const bulan = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            let d = new Date(dateString);
            return d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear();
        }
    </script>

    <script>
        function hitungUsia(birthDate, testDate) {
            if (!birthDate) return '—';

            let lahir = new Date(birthDate);

            // pakai tanggal tes sebagai acuan
            let acuan = testDate ? new Date(testDate) : new Date();

            let umur = acuan.getFullYear() - lahir.getFullYear();
            let m = acuan.getMonth() - lahir.getMonth();

            if (m < 0 || (m === 0 && acuan.getDate() < lahir.getDate())) {
                umur--;
            }

            return umur + ' Tahun';
        }
    </script>

    <script>
        function openModal(data) {

            let subtests = ['se', 'wa', 'an', 'ge', 'me', 'ra', 'zr', 'fa', 'wu'];

            let rows = '';

            subtests.forEach(s => {
                rows += `
                <tr class="border-b">
                    <td class="p-3 font-semibold">${s.toUpperCase()}</td>
                    <td class="p-3 text-center">${data['rw_' + s] ?? 0}</td>
                    <td class="p-3 text-center">${data['sw_' + s] ?? '—'}</td>
                    <td class="p-3 text-center">${data['cat_' + s] ?? '—'}</td>
                </tr>
            `;
            });

            let html = `
            <div class="text-center mb-8">

                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800 mb-6">
                    Detail Hasil Tes
                </h1>

               <!-- DATA PESERTA -->
                <div class="mb-6 p-4 bg-gray-50 border rounded-xl text-sm text-left">
                    <div class="grid md:grid-cols-2 gap-2 text-gray-700">

                        <div><b>Nama</b> : ${data.participant?.name ?? '-'}</div>

                        <div><b>Jenis Kelamin</b> : ${data.participant?.gender ?? '-'}</div>

                        <div><b>Tgl Lahir</b> : ${formatTanggal(data.participant?.birth_date)}</div>

                        <div><b>Tgl Tes</b> : ${formatTanggal(data.participant?.test_finished_at)}</div>

                        <div><b>Usia</b> : ${hitungUsia(
                            data.participant?.birth_date,
                            data.participant?.test_finished_at
                        )}</div>

                    </div>
                </div>
            </div>

        <!-- IQ -->
        <div class="mb-6 p-6 bg-indigo-50 border border-indigo-200 rounded-xl text-center">
            <div class="text-sm text-indigo-700 font-medium">
                Intelligence Quotient (IQ)
            </div>
            <div class="text-4xl font-bold text-indigo-700 mt-2">
                ${data.iq ?? '—'}
            </div>
            <div class="text-sm text-gray-600 mt-1">
                ${data.iq_category ?? '—'}
            </div>
        </div>

        <!-- Dominasi -->
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-center">
            <div class="text-sm text-blue-700 font-medium">
                Dominasi Kemampuan
            </div>
            <div class="text-lg font-semibold text-blue-800 mt-1">
                ${data.dominasi ?? '—'}
            </div>
        </div>

        <h2 class="text-lg font-semibold text-gray-800 mb-4">
            Skor Per Subtest
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="p-3 text-left">Subtest</th>
                        <th class="p-3 text-center">RW</th>
                        <th class="p-3 text-center">SW</th>
                        <th class="p-3 text-center">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    ${rows}

                    <tr class="bg-gray-50 font-semibold">
                        <td class="p-3">JML</td>
                        <td class="p-3 text-center">${data.total_rw}</td>
                        <td class="p-3 text-center">${data.total_sw ?? '—'}</td>
                        <td></td>
                    </tr>

                    <tr class="bg-indigo-50 font-semibold">
                        <td class="p-3">IQ</td>
                        <td class="p-3 text-center">${data.iq ?? '—'}</td>
                        <td></td>
                        <td class="p-3 text-center">${data.iq_category ?? '—'}</td>
                    </tr>

                    <tr class="bg-blue-50 font-semibold">
                        <td class="p-3">Dominasi</td>
                        <td colspan="3" class="p-3 text-center">
                            ${data.dominasi ?? '—'}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- BUTTON -->
        <div class="mt-6">
            <button onclick="window.print()"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700">
                🖨️ Cetak / Simpan PDF
            </button>
        </div>
        `;

            document.getElementById('modalContent').innerHTML = html;
            document.getElementById('modalDetail').classList.remove('hidden');
            document.getElementById('modalDetail').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modalDetail').classList.add('hidden');
            document.getElementById('modalDetail').classList.remove('flex');
        }
    </script>


</body>

</html>
