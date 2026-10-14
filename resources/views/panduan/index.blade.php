<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan / Pedoman</title>

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
            max-width: 1100px;
            margin: auto;
            padding: 35px;
        }

        .header {
            background: white;
            padding: 22px 25px;
            border-radius: 13px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.07);
        }

        .header h1 {
            color: #172554;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .header p {
            color: #64748b;
            font-size: 13px;
        }

        .back {
            text-decoration: none;
            background: #64748b;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
            font-size: 13px;
        }

        .back:hover {
            background: #475569;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .document-card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
        }

        .pdf-icon {
            width: 48px;
            height: 48px;
            background: #fee2e2;
            color: #dc2626;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .document-card h3 {
            color: #172554;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .document-card p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .view-button {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 6px;
            font-size: 12px;
        }

        .view-button:hover {
            background: #1d4ed8;
        }

        .empty {
            background: white;
            padding: 50px 20px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 12px;
        }

        @media (max-width: 900px) {
            .document-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .document-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div>
                <h1>📚 Panduan / Pedoman</h1>
                <p>Daftar dokumen panduan dan pedoman keperawatan</p>
            </div>

            <div style="display: flex; gap: 10px;">

                <a href="{{ route('panduan.create') }}"
                    style="text-decoration: none; background: #2563eb; color: white; padding: 10px 16px; border-radius: 7px; font-size: 13px;">
                    + Tambah Panduan
                </a>

                <a href="{{ url('/dashboard') }}" class="back">
                    ← Dashboard
                </a>

            </div>

        </div>


        @if($panduans->count() > 0)

            <div class="document-grid">

                @foreach($panduans as $panduan)

                    <div class="document-card">

                        <div class="pdf-icon">
                            📄
                        </div>

                        <h3>{{ $panduan->judul }}</h3>

                        <p>
                            {{ $panduan->deskripsi ?? 'Tidak ada deskripsi.' }}
                        </p>

                        <div style="display: flex; gap: 8px;">

                            <a href="{{ asset('storage/' . $panduan->file_pdf) }}" target="_blank" class="view-button">
                                Lihat PDF
                            </a>

                            <a href="{{ route('panduan.edit', $panduan->id) }}" class="view-button"
                                style="background: #f59e0b;">
                                Edit
                            </a>

                            <form action="{{ route('panduan.destroy', $panduan->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="view-button"
                                    style="background: #dc2626; border: none; cursor: pointer;">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    📚
                </div>

                <h3>Belum ada dokumen</h3>

                <p>
                    Belum terdapat dokumen panduan atau pedoman.
                </p>

            </div>

        @endif

    </div>

</body>

</html>