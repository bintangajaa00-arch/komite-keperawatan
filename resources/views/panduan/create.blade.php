<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Panduan / Pedoman</title>

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

            <h1>Tambah Panduan / Pedoman</h1>

            <p class="description">
                Tambahkan dokumen panduan atau pedoman keperawatan dalam format PDF.
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

            <form action="{{ route('panduan.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="judul">Judul Dokumen</label>

                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                        placeholder="Masukkan judul dokumen" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>

                    <textarea id="deskripsi" name="deskripsi"
                        placeholder="Masukkan deskripsi dokumen">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="file_pdf">File PDF</label>

                    <input type="file" id="file_pdf" name="file_pdf" accept=".pdf" required>
                </div>

                <div class="buttons">

                    <button type="submit" class="button save">
                        Simpan Dokumen
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