<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah OPPE - Komite Keperawatan</title>

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
            max-width: 820px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 34px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        h1 {
            color: #1e3a8a;
            margin-bottom: 8px;
            font-size: 32px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .user-info {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 13px;
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
            margin-top: 8px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.5;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .button {
            padding: 12px 20px;
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

        .save:hover {
            background: #1d4ed8;
        }

        .cancel {
            background: #e5e7eb;
            color: #374151;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 20px;
            }

            .card {
                padding: 22px;
            }

            .buttons {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>

    <div class="container">
        <div class="card">

            <h1>Tambah OPPE</h1>

            <p class="description">
                Tambahkan dokumen OPPE dalam format PDF untuk data personal perawat.
            </p>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="user-info">
                <strong>Nama Perawat:</strong>
                {{ $dataPersonal->nama }}
            </div>

            <form action="{{ route('oppe.store', $dataPersonal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama_oppe">Nama Dokumen OPPE</label>

                    <input type="text" id="nama_oppe" name="nama_oppe" value="{{ old('nama_oppe') }}"
                        placeholder="Contoh: OPPE Tahun 2026" maxlength="255" required>

                    @error('nama_oppe')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file_oppe">Upload Dokumen OPPE (PDF)</label>

                    <input type="file" id="file_oppe" name="file_oppe" accept=".pdf,application/pdf" required>

                    <div class="info">
                        Format file harus PDF dengan ukuran maksimal 10 MB.
                    </div>

                    @error('file_oppe')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                @if ($errors->any())
                    <div class="error" style="margin-top: 15px;">
                        Periksa kembali input Anda. Pastikan nama dokumen terisi
                        dan file PDF berukuran maksimal 10 MB.
                    </div>
                @endif

                <div class="buttons">
                    <button type="submit" class="button save">
                        Simpan OPPE
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