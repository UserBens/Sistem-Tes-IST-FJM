<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Identitas Peserta</title>
    <style>
        /* Font & Reset */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 520px;
            margin: 60px auto;
            padding: 40px 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #1f2937;
            font-size: 26px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
            color: #6b7280;
        }

        /* Progress Bar */
        .progress-bar {
            height: 8px;
            background: #d1d5db;
            border-radius: 4px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            width: 25%; /* bisa diubah sesuai langkah */
            background: #4a90e2;
            transition: width 0.3s ease;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            font-size: 15px;
            transition: all 0.2s;
            background: #f9fafb;
        }

        input:focus,
        select:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 2px rgba(74,144,226,0.2);
            outline: none;
            background: #fff;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #3571c3;
            transform: translateY(-2px);
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 4px;
        }

        /* Info Box */
        .info-box {
            background: #f0f9ff;
            border-left: 4px solid #4a90e2;
            padding: 12px 15px;
            border-radius: 6px;
            font-size: 13px;
            color: #1e40af;
            margin-bottom: 25px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
                margin: 40px 10px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Identitas Peserta</h2>
        <div class="subtitle">Silakan isi data diri dengan benar sebelum memulai tes.</div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-bar-fill"></div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            Pastikan data yang Anda masukkan sesuai dengan data yang terdaftar di sistem Kanto.
        </div>

        {{-- <form action="{{ route('participant.validate') }}" method="POST">
            @csrf --}}

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" placeholder="Contoh: Budi Santoso" value="{{ old('name') }}">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birth_place">Tempat Lahir</label>
                <input type="text" name="birth_place" id="birth_place" placeholder="Contoh: Surabaya" value="{{ old('birth_place') }}">
                @error('birth_place')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="birth_date">Tanggal Lahir</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}">
                @error('birth_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Lanjut ke Tes</button>
        {{-- </form> --}}
    </div>
</body>
</html>