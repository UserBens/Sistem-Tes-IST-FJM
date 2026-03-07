<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Selesai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">

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
