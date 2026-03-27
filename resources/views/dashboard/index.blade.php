<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

        <!-- Total Peserta -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500 text-sm">Total Peserta</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">
                {{ $totalPeserta }}
            </p>
        </div>

        <!-- Rata-rata IQ -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500 text-sm">Rata-rata IQ</h2>
            <p class="text-3xl font-bold text-indigo-600 mt-2">
                {{ $avgIq ?? '-' }}
            </p>
        </div>

    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Data Hasil Tes Peserta
        </h2>
        <div class="bg-white rounded-2xl shadow p-6 mb-6">

            <form method="GET" class="grid md:grid-cols-4 gap-4">

                <!-- Cari Nama -->
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama peserta..."
                    class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300">

                <!-- Filter Kategori -->
                <select name="iq_category" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300">
                    <option value="">Semua Kategori</option>
                    <option value="Very Superior">Very Superior</option>
                    <option value="Superior">Superior</option>
                    <option value="Average">Average</option>
                    <option value="Below Average">Below Average</option>
                </select>

                <!-- Tanggal Tes -->
                <input type="date" name="tanggal_tes" value="{{ request('tanggal_tes') }}"
                    class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-300">

                <!-- Button -->
                <button class="bg-indigo-600 text-white rounded-lg px-4 py-2 hover:bg-indigo-700">
                    Filter
                </button>

            </form>

        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Total RW</th>
                        <th class="px-4 py-3">Total SW</th>
                        <th class="px-4 py-3">IQ</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Dominasi</th>
                        <th class="px-4 py-3">Tanggal Tes</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $index => $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $results->firstItem() + $index }}</td>

                            <td class="px-4 py-3">
                                {{ $item->participant->name ?? '-' }}
                            </td>
                            <td class="px-4 py-3">{{ $item->total_rw }}</td>
                            <td class="px-4 py-3">{{ $item->total_sw }}</td>
                            <td class="px-4 py-3 font-semibold text-indigo-600">
                                {{ $item->iq }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs bg-indigo-100 text-indigo-700">
                                    {{ $item->iq_category }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->dominasi }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->participant->test_finished_at
                                    ? \Carbon\Carbon::parse($item->participant->test_finished_at)->translatedFormat('d F Y H:i')
                                    : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                <button onclick='openModal(@json($item))'
                                    class="bg-indigo-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-indigo-600">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                Belum ada data hasil tes
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
