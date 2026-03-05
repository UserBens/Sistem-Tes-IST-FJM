{{-- <!DOCTYPE html>
<html>

<head>
    <title>Subtest</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 800px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .duration {
            color: #555;
            margin-bottom: 20px;
        }

        .instruction {
            white-space: pre-line;
            line-height: 1.6;
            font-size: 15px;
        }

        .btn-start {
            margin-top: 30px;
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-start:hover {
            background: #218838;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card">

            <div class="title">
                {{ $subtest->subtest_name }}
            </div>

            <div class="duration">
                Duration : {{ $subtest->duration }} minutes
            </div>

            <hr>

            <div class="instruction">
                {{ $subtest->instruction }}
            </div>

            @if ($subtest->instruction_image)
                <div style="margin-top:20px;">
                    <img src="{{ asset('storage/' . $subtest->instruction_image) }}" width="500">
                </div>
            @endif

            <a href="#" class="btn-start">
                Start Test
            </a>

        </div>

    </div>

</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>{{ $subtest->subtest_name }}</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .instruction {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .question {
            margin-bottom: 25px;
        }

        .option {
            margin-left: 20px;
        }
    </style>

</head>

<body>

    {{-- <h2>{{ $subtest->subtest_name }}</h2>

    <div class="instruction">

        {!! nl2br($subtest->instruction) !!}

        @if ($subtest->instruction_image)
            <br><br>
            <img src="{{ asset($subtest->instruction_image) }}" width="400">
        @endif

    </div> --}}
    <div class="container">

        <div class="card">

            @foreach ($subtest->questions as $index => $question)
                <div class="question">

                    <strong>
                        {{ $index + 1 }}. {{ $question->question }}
                    </strong>

                    @foreach ($question->options as $option)
                        <div class="option">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}">
                                {{ $option->option_text }}
                            </label>
                        </div>
                    @endforeach

                </div>
            @endforeach

        </div>

    </div>




</body>

</html>
