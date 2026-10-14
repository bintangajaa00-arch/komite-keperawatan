<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Sertifikat - Komite Keperawatan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 18px 40px;
        }

        .navbar h2 {
            font-size: 20px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h1 {
            color: #1e3a8a;
            margin-bottom: 8px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .user-info {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .user-info strong {
            color: #1e3a8a;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .info {
            margin-top: 7px;
            color: #6b7280;
            font-size: 13px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .button {
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .save {
            background: #2563eb;
            color: white;
        }

        .cancel {
            background: #e5e7eb;
            color: #374151;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>

    <div class="container">

        <div class="card">

            <h1>Tambah Sertifikat</h1>

            <p class="description">
                Tambahkan sertifikat baru untuk data personal perawat.
            </p>

            <div class="user-info">
                <strong>Nama Perawat:</strong>
                {{ $dataPersonal->nama }}
            </div>

            <form action="{{ route('sertifikat.store', $dataPersonal->id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="nama_sertifikat">
                        Nama Sertifikat
                    </label>

                    <input type="text" id="nama_sertifikat" name="nama_sertifikat" value="{{ old('nama_sertifikat') }}"
                        placeholder="Contoh: Sertifikat BTCLS" required>

                    @error('nama_sertifikat')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="file_sertifikat">
                        Upload Sertifikat (PDF)
                    </label>

                    <input type="file" id="file_sertifikat" name="file_sertifikat" accept=".pdf,application/pdf"
                        required>

                    <div class="info">
                        Format file yang diperbolehkan: PDF.
                        Maksimal ukuran 10 MB.
                    </div>

                    @error('file_sertifikat')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="buttons">

                    <button type="submit" class="button save">
                        Simpan Sertifikat
                    </button>

                    <a href="{{ route('data-personal.index') }}" class="button cancel">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>