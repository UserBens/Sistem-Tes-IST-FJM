<!DOCTYPE html>
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

</html>