<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah SPO - Komite Keperawatan</title>

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
            max-width: 750px;
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

        .card>p {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
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

            <h1>Tambah SPO Keperawatan</h1>

            <p>
                Tambahkan dokumen Standar Prosedur Operasional Keperawatan.
            </p>

            <form action="{{ route('spo.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="judul">
                        Judul SPO
                    </label>

                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                        placeholder="Masukkan judul SPO" required>

                    @error('judul')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea id="deskripsi" name="deskripsi"
                        placeholder="Masukkan deskripsi SPO">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="file_pdf">
                        File PDF
                    </label>

                    <input type="file" id="file_pdf" name="file_pdf" accept=".pdf,application/pdf" required>

                    <small style="display:block; margin-top:6px; color:#6b7280;">
                        Format file harus PDF, maksimal 10 MB.
                    </small>

                    @error('file_pdf')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="buttons">

                    <button type="submit" class="button save">
                        Simpan SPO
                    </button>

                    <a href="{{ route('spo.index') }}" class="button cancel">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>