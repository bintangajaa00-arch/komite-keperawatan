<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPO Keperawatan - Komite Keperawatan</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 20px;
        }

        .back-button {
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.15);
            padding: 9px 16px;
            border-radius: 8px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            color: #1e3a8a;
        }

        .header p {
            margin-top: 6px;
            color: #6b7280;
        }

        .add-button {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            white-space: nowrap;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .document-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            min-width: 0;
        }

        .document-icon {
            width: 55px;
            height: 55px;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .document-card h3 {
            font-size: 18px;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .document-card p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
            min-height: 42px;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .button-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .view-button {
            display: inline-block;
            padding: 9px 13px;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            border: none;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .view {
            background: #2563eb;
        }

        .edit {
            background: #f59e0b;
        }

        .delete {
            background: #dc2626;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 60px 20px;
            border-radius: 14px;
            color: #6b7280;
        }

        @media (max-width: 900px) {
            .document-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .document-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Komite Keperawatan</h2>

        <a href="{{ url('/dashboard') }}" class="back-button">
            ← Dashboard
        </a>
    </div>

    <div class="container">

        <div class="header">
            <div>
                <h1>SPO Keperawatan</h1>
                <p>Daftar Standar Prosedur Operasional Keperawatan</p>
            </div>

            <a href="{{ route('spo.create') }}" class="add-button">
                + Tambah SPO
            </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($spos->count() > 0)

            <div class="document-grid">

                @foreach($spos as $spo)

                    <div class="document-card">

                        <div class="document-icon">
                            {{ $spo->link ? 'LINK' : 'PDF' }}
                        </div>

                        <h3>{{ $spo->judul }}</h3>

                        <p>
                            {{ $spo->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>

                        <div class="button-group">

                            @if($spo->link)
                                <a href="{{ $spo->link }}" target="_blank" rel="noopener noreferrer" class="view-button view">
                                    Buka Link SPO
                                </a>
                            @elseif($spo->file_pdf)
                                <a href="{{ asset('storage/' . $spo->file_pdf) }}" target="_blank" rel="noopener noreferrer"
                                    class="view-button view">
                                    Lihat PDF
                                </a>
                            @else
                                <span style="font-size: 13px; color: #6b7280;">
                                    Link belum tersedia
                                </span>
                            @endif

                            <a href="{{ route('spo.edit', $spo->id) }}" class="view-button edit">
                                Edit
                            </a>

                            <form action="{{ route('spo.destroy', $spo->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus dokumen SPO ini?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="view-button delete">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>Belum ada dokumen SPO</h3>
                <p style="margin-top: 8px;">
                    Silakan tambahkan SPO Keperawatan.
                </p>
            </div>

        @endif

    </div>

</body>

</html>