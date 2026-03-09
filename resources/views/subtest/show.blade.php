<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Subtest</title>
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
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">
                    Instruksi {{ $subtest->subtest_name }}
                </h1>

                <p class="text-gray-600 mt-2">
                    Baca instruksi berikut sebelum memulai tes
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
                    <div class="bg-indigo-600 h-2 rounded-full w-2/3"></div>
                </div>
            </div>

            <!-- Timer Box -->
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center justify-between">
                <div class="flex items-center gap-2 text-red-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">Tes dimulai otomatis dalam:</span>
                </div>
                <span id="timer" class="text-2xl font-bold text-red-600 tabular-nums">-- : --</span>
            </div>

            <!-- Duration Badge -->
            <div
                class="mb-4 inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 border border-indigo-200 rounded-full text-indigo-700 text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Durasi: {{ $subtest->duration }} menit
            </div>

            <hr class="mb-5 border-gray-200">

            <!-- Instruction Content -->
            <div
                class="mb-5 p-4 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 text-sm leading-relaxed whitespace-pre-line">
                {{ $subtest->instruction }}
            </div>

            <!-- Instruction Image -->
            @if ($subtest->instruction_image)
                <div class="mb-6 rounded-lg overflow-hidden border border-gray-200">
                    <img src="{{ asset('storage/' . $subtest->instruction_image) }}"
                        class="w-full object-contain max-h-72" alt="Gambar Instruksi">
                </div>
            @endif

        </div>
    </div>

    <script>
        let timeLeft = {{ $timeLeft }};
        let hasQuestions = {{ $hasQuestions ? 'true' : 'false' }};

        const timerElement = document.getElementById("timer");

        const countdown = setInterval(function() {

            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;

            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerElement.textContent = minutes + ":" + seconds;

            timeLeft--;

            if (timeLeft < 0) {

                clearInterval(countdown);

                if (hasQuestions) {

                    window.location.href = "{{ route('questions.show', $subtest->id) }}";

                } else {

                    window.location.href = "{{ route('test.finish') }}";

                }

            }

        }, 1000);
    </script>
</body>

</html>
