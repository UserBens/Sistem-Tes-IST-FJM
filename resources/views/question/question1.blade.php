<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subtest->subtest_name }}</title>
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
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800">
                    {{ $subtest->subtest_name }}
                </h1>

                <p class="text-gray-600 mt-2">
                    Pilih jawaban yang paling tepat untuk setiap soal
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
                    <div class="bg-indigo-600 h-2 rounded-full w-full"></div>
                </div>
            </div>

            <!-- Timer Box -->
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center justify-between">
                <div class="flex items-center gap-2 text-red-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">Sisa waktu:</span>
                </div>
                <span id="timer" class="text-2xl font-bold text-red-600 tabular-nums">--:--</span>
            </div>

            <!-- Info Box -->
            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-lg text-sm">
                Jawab semua soal dengan teliti. Tes akan otomatis dikumpulkan saat waktu habis.
            </div>

            {{-- <form action="{{ route('subtest.submit', $subtest->id) }}" method="POST"> --}}
            @csrf

            <!-- Questions -->
            <div class="space-y-6 mb-8">
                @foreach ($subtest->questions as $index => $question)
                    <div class="p-5 border border-gray-200 rounded-xl bg-gray-50">

                        <!-- Question Number + Text -->
                        <div class="mb-4">
                            <span
                                class="inline-flex items-center justify-center w-7 h-7 bg-indigo-600 text-white text-xs font-bold rounded-full mr-2">
                                {{ $index + 1 }}
                            </span>

                            @if (Str::endsWith($question->question, ['.png', '.jpg', '.jpeg', '.webp']))
                                <img src="{{ asset('storage/' . $question->question) }}" alt="Soal {{ $index + 1 }}"
                                    class="mt-3 rounded-lg border border-gray-200 max-w-full">
                            @else
                                <span class="text-gray-800 font-medium text-sm leading-relaxed">
                                    {{ $question->question }}
                                </span>
                            @endif
                        </div>

                        <!-- Options -->
                        <div class="space-y-2 mt-3">
                            @foreach ($question->options as $option)
                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 bg-white
                                              hover:border-indigo-400 hover:bg-indigo-50 cursor-pointer transition duration-150
                                              has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50">

                                    <input
                                        type="{{ $question->question_type == 'multiple_choice' ? 'checkbox' : 'radio' }}"
                                        name="question_{{ $question->id }}{{ $question->question_type == 'multiple_choice' ? '[]' : '' }}"
                                        value="{{ $option->id }}" class="accent-indigo-600 w-4 h-4 shrink-0">

                                    @if ($option->option_image)
                                        <img src="{{ asset('storage/' . $option->option_image) }}" alt="Pilihan"
                                            class="max-h-16 object-contain rounded">
                                    @else
                                        <span class="text-sm text-gray-700">{{ $option->option_text }}</span>
                                    @endif
                                </label>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold
                       hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300
                       transition duration-200">
                Kirim Jawaban
            </button>

            {{-- </form> --}}

        </div>
    </div>

    <script>
        let timeLeft = 10;
        const timerElement = document.getElementById("timer");

        const countdown = setInterval(function() {

            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;

            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerElement.textContent = minutes + ":" + seconds;

            timeLeft--;

            if (timeLeft < 0) {

                clearInterval(countdown);

                let nextSubtest = {{ $subtest->order + 1 }};

                window.location.href = "/subtests/" + nextSubtest + "/questions";

            }

        }, 1000);
    </script>

</body>

</html>
