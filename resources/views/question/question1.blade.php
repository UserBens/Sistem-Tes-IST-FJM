<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subtest->subtest_name }}</title>
    <style>
        /* Reset & Font */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .subtest-title {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .instruction {
            background: #e8f0fe;
            padding: 20px;
            border-left: 5px solid #4a90e2;
            border-radius: 8px;
            margin-bottom: 30px;
            color: #333;
            line-height: 1.5;
        }

        .question {
            margin-bottom: 30px;
            padding: 20px;
            background: #f4f5f7;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .question:hover {
            transform: translateY(-2px);
        }

        .question-title {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #222;
        }

        .option {
            margin-bottom: 12px;
        }

        .option label {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            cursor: pointer;
            transition: all 0.2s;
        }

        .option label:hover {
            background: #e2f0ff;
            border-color: #4a90e2;
        }

        .option input[type="radio"],
        .option input[type="checkbox"] {
            margin-right: 12px;
        }

        .submit-btn {
            display: inline-block;
            padding: 12px 25px;
            background: #4a90e2;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background: #3571c3;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .question-title {
                font-size: 16px;
            }

            .option label {
                padding: 10px;
            }

            .submit-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="subtest-title">{{ $subtest->subtest_name }}</div>

        {{-- @if ($subtest->instruction)
            <div class="instruction">
                {{ $subtest->instruction }}
            </div>
        @endif --}}

        {{-- <form action="{{ route('subtest.submit', $subtest->id) }}" method="POST"> --}}
        @csrf

        @foreach ($subtest->questions as $index => $question)
            <div class="question">
                <div class="question-title">

                    {{-- Cek apakah question berisi path gambar atau teks biasa --}}
                    @if (Str::endsWith($question->question, ['.png', '.jpg', '.jpeg', '.webp']))
                        <img src="{{ asset('storage/' . $question->question) }}" alt="Soal {{ $index + 1 }}">
                    @else
                        {{ $question->question }}
                    @endif

                    @if ($question->question_type == 'multiple_choice')
                        <span style="font-size: 12px; color: #555;"></span>
                    @endif
                </div>

                @foreach ($question->options as $option)
                    <div class="option">
                        <label>
                            <input type="{{ $question->question_type == 'multiple_choice' ? 'checkbox' : 'radio' }}"
                                name="question_{{ $question->id }}{{ $question->question_type == 'multiple_choice' ? '[]' : '' }}"
                                value="{{ $option->id }}">

                            {{-- Tampilkan gambar jika option_image ada, tampilkan teks jika tidak --}}
                            @if ($option->option_image)
                                <img src="{{ asset('storage/' . $option->option_image) }}" alt="Pilihan">
                            @else
                                {{ $option->option_text }}
                            @endif
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="submit-btn">Kirim Jawaban</button>
        {{-- </form> --}}

    </div>
</body>

</html>
