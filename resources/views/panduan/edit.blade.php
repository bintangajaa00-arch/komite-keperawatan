<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Panduan / Pedoman</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #eef2f7;
            color: #1e293b;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 35px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 13px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.07);
        }

        h1 {
            color: #172554;
            font-size: 24px;
            margin-bottom: 7px;
        }

        .description {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        input[type="file"] {
            background: #f8fafc;
        }

        .current-file {
            background: #f1f5f9;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 10px;
            font-size: 13px;
            color: #475569;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .button {
            border: none;
            text-decoration: none;
            padding: 10px 17px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .save {
            background: #2563eb;
            color: white;
        }

        .save:hover {
            background: #1d4ed8;
        }

        .back {
            background: #64748b;
            color: white;
        }

        .back:hover {
            background: #475569;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error ul {
            margin-left: 18px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card">

            <h1>Edit Panduan / Pedoman</h1>

            <p class="description">
                Ubah informasi dokumen panduan atau pedoman.
            </p>

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('panduan.update', $panduan->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="judul">Judul Dokumen</label>

                    <input type="text" id="judul" name="judul" value="{{ old('judul', $panduan->judul) }}" required>

                </div>

                <div class="form-group">

                    <label for="deskripsi">Deskripsi</label>

                    <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $panduan->deskripsi) }}</textarea>

                </div>

                <div class="form-group">

                    <label>File PDF Saat Ini</label>

                    <div class="current-file">
                        📄 {{ basename($panduan->file_pdf) }}
                    </div>

                    <label for="file_pdf">Ganti File PDF (opsional)</label>

                    <input type="file" id="file_pdf" name="file_pdf" accept=".pdf">

                </div>

                <div class="buttons">

                    <button type="submit" class="button save">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('panduan.index') }}" class="button back">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>