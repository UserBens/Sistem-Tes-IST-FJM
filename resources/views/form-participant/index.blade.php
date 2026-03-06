<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Identitas Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-95 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl p-8">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.9 6.121 9 9 0 015.12 17.804z" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Form Identitas Peserta
                </h1>

                <p class="text-gray-600 mt-2">
                    Isi data diri sebelum memulai tes IST FJM
                </p>
            </div>

            <!-- Progress -->
            <div class="mb-6">
                <div class="flex justify-between text-xs text-gray-500 mb-1">
                    <span>Identitas</span>
                    <span>Instruksi</span>
                    <span>Soal</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-indigo-600 h-2 rounded-full w-1/3"></div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-lg text-sm">
                Pastikan data yang Anda masukkan sesuai dengan data yang terdaftar di sistem.
            </div>

            <form action="{{ route('participant.store') }}" method="POST">
                @csrf

                <!-- Form Grid 2 kolom -->
                <div class="grid grid-cols-2 gap-x-5 gap-y-5 mb-5">

                    <!-- Nama Lengkap (full width) -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 border rounded-lg outline-none focus:ring-2 focus:ring-indigo-300 transition"
                            placeholder="Contoh: Budi Santoso">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tempat Lahir
                        </label>
                        <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                            class="w-full px-4 py-3 border rounded-lg outline-none focus:ring-2 focus:ring-indigo-300 transition"
                            placeholder="Contoh: Surabaya">
                        @error('birth_place')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                            class="w-full px-4 py-3 border rounded-lg outline-none focus:ring-2 focus:ring-indigo-300 transition">
                        @error('birth_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin (full width) -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kelamin
                        </label>
                        <select name="gender"
                            class="w-full px-4 py-3 border rounded-lg outline-none focus:ring-2 focus:ring-indigo-300 transition">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold
                       hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300
                       transition duration-200">
                    Lanjut ke Tes
                </button>

            </form>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-4 text-center">
                @csrf
                <button class="text-sm text-red-500 hover:text-red-700">
                    Logout
                </button>
            </form>

        </div>
    </div>

</body>

</html>
