<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Personal - Komite Keperawatan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --blue: #2563eb;
            --blue-dark: #1d4ed8;
            --text: #172554;
            --muted: #64748b;
            --border: #e2e8f0;
            --surface: #ffffff;
            --page: #f5f7fb;
            --green: #15803d;
            --red: #dc2626;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--page);
            color: #334155;
            min-height: 100vh;
            font-size: 13px;
        }

        a,
        button,
        input,
        select {
            font: inherit;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        .navbar {
            min-height: 64px;
            padding: 0 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            color: white;
            background: #1e40af;
            box-shadow: 0 2px 10px #0f172a12;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            background: #ffffff20;
            font-size: 18px;
            font-weight: 800;
        }

        .navbar h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .back-button {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 8px;
            background: #ffffff16;
            border: 1px solid #ffffff30;
            font-size: 12px;
            font-weight: 700;
            transition: background .2s;
        }

        .back-button:hover {
            background: #ffffff2c;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 26px 24px 36px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .page-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            color: var(--blue);
            background: #e8efff;
            font-size: 22px;
        }

        .page-header h1 {
            font-size: 25px;
            color: var(--text);
            letter-spacing: -.5px;
        }

        .page-header p {
            color: var(--muted);
            margin-top: 5px;
            font-size: 13px;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 9px;
            color: white;
            background: var(--blue);
            text-decoration: none;
            font-weight: 700;
            white-space: nowrap;
            box-shadow: 0 3px 8px #2563eb20;
            transition: .2s;
        }

        .add-button:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        .success {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            margin-bottom: 16px;
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            font-weight: 600;
        }

        .filter-panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px #0f172a05;
        }

        .filter-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 600px;
        }

        .search-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .search-box input,
        .room-filter select {
            width: 100%;
            height: 42px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            outline: none;
            background: white;
            color: #334155;
            transition: border .2s, box-shadow .2s;
        }

        .search-box input {
            padding: 0 12px 0 38px;
        }

        .room-filter {
            width: 250px;
        }

        .room-filter select {
            padding: 0 12px;
            cursor: pointer;
        }

        .search-box input:focus,
        .room-filter select:focus {
            border-color: #93b4ff;
            box-shadow: 0 0 0 3px #2563eb12;
        }

        .data-scroll {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .personal-card {
            --room-color: #64748b;
            --room-light: #f1f5f9;
            --room-border: #e2e8f0;
            --room-dark: #334155;
            background: white;
            border: 1px solid var(--border);
            border-left: 4px solid var(--room-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px #0f172a06;
            transition: box-shadow .2s, border-color .2s;
        }

        .personal-card:hover {
            box-shadow: 0 5px 18px #0f172a0b;
        }

        .room-k-iri {
            --room-color: #2563eb;
            --room-light: #eff6ff;
            --room-border: #dbeafe;
            --room-dark: #1d4ed8;
        }

        .room-mpp {
            --room-color: #7c3aed;
            --room-light: #f5f3ff;
            --room-border: #ede9fe;
            --room-dark: #6d28d9;
        }

        .room-mutu {
            --room-color: #059669;
            --room-light: #ecfdf5;
            --room-border: #d1fae5;
            --room-dark: #047857;
        }

        .room-ppi {
            --room-color: #dc2626;
            --room-light: #fef2f2;
            --room-border: #fee2e2;
            --room-dark: #b91c1c;
        }

        .room-catleya {
            --room-color: #db2777;
            --room-light: #fdf2f8;
            --room-border: #fce7f3;
            --room-dark: #be185d;
        }

        .room-alamanda {
            --room-color: #ea580c;
            --room-light: #fff7ed;
            --room-border: #ffedd5;
            --room-dark: #c2410c;
        }

        .room-gardenia {
            --room-color: #0d9488;
            --room-light: #f0fdfa;
            --room-border: #ccfbf1;
            --room-dark: #0f766e;
        }

        .room-tulip {
            --room-color: #4f46e5;
            --room-light: #eef2ff;
            --room-border: #e0e7ff;
            --room-dark: #4338ca;
        }

        .room-hd {
            --room-color: #0891b2;
            --room-light: #ecfeff;
            --room-border: #cffafe;
            --room-dark: #0e7490;
        }

        .room-irj {
            --room-color: #a16207;
            --room-light: #fefce8;
            --room-border: #fef08a;
            --room-dark: #854d0e;
        }

        .room-ibs {
            --room-color: #be185d;
            --room-light: #fdf2f8;
            --room-border: #fce7f3;
            --room-dark: #9d174d;
        }

        .room-icu {
            --room-color: #b91c1c;
            --room-light: #fef2f2;
            --room-border: #fee2e2;
            --room-dark: #991b1b;
        }

        .room-igd {
            --room-color: #ea580c;
            --room-light: #fff7ed;
            --room-border: #ffedd5;
            --room-dark: #c2410c;
        }

        .room-mawar {
            --room-color: #e11d48;
            --room-light: #fff1f2;
            --room-border: #ffe4e6;
            --room-dark: #be123c;
        }

        .room-amarylis {
            --room-color: #9333ea;
            --room-light: #faf5ff;
            --room-border: #f3e8ff;
            --room-dark: #7e22ce;
        }

        .room-empty {
            --room-color: #64748b;
            --room-light: #f8fafc;
            --room-border: #e2e8f0;
            --room-dark: #475569;
        }

        .card-main {
            display: grid;
            grid-template-columns: minmax(240px, 1.8fr) minmax(130px, .8fr) minmax(120px, .8fr) auto;
            align-items: center;
            gap: 20px;
            padding: 18px 20px;
        }

        .person {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .avatar {
            flex: 0 0 44px;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: var(--room-light);
            color: var(--room-dark);
            border: 1px solid var(--room-border);
            font-size: 16px;
            font-weight: 800;
        }

        .person-name {
            color: var(--text);
            font-size: 14px;
            font-weight: 700;
            line-height: 1.45;
            overflow-wrap: anywhere;
        }

        .person-unit {
            display: inline-flex;
            margin-top: 6px;
            padding: 4px 9px;
            border-radius: 6px;
            background: var(--room-light);
            color: var(--room-dark);
            font-size: 11px;
            font-weight: 700;
        }

        .info-label {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 6px;
        }

        .info-value {
            color: #334155;
            font-size: 12px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .edit-button,
        .delete-data-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 64px;
            min-height: 34px;
            padding: 7px 12px;
            border-radius: 7px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .edit-button {
            color: var(--room-dark);
            background: var(--room-light);
            border: 1px solid var(--room-border);
        }

        .edit-button:hover {
            filter: brightness(.96);
        }

        .delete-data-button {
            color: var(--red);
            background: #fff;
            border: 1px solid #fecaca;
        }

        .delete-data-button:hover {
            background: #fef2f2;
        }

        .delete-form {
            display: inline-flex;
            margin: 0;
        }

        .detail {
            border-top: 1px solid #edf1f6;
            padding: 16px 20px 18px;
            background: #fcfdff;
        }

        .detail-header {
            margin-bottom: 12px;
        }

        .detail-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #334155;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .detail-title span {
            color: var(--room-color);
            font-size: 15px;
        }

        .document-list {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            gap: 8px;
        }

        .document {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            min-height: 36px;
            padding: 7px 10px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            max-width: 100%;
        }

        .document-name {
            color: #475569;
            font-size: 11px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .pdf-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 8px;
            border-radius: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .pdf-link:hover {
            background: #dbeafe;
        }

        .not-available {
            color: #cbd5e1;
            font-size: 12px;
        }

        .certificate {
            background: #f0fdf4;
            border-color: #dcfce7;
        }

        .certificate .document-name {
            color: #166534;
        }

        .certificate .pdf-link {
            background: #dcfce7;
            color: #166534;
        }

        .certificate .pdf-link:hover {
            background: #bbf7d0;
        }

        .delete-button {
            width: 23px;
            height: 23px;
            border: 1px solid #fecaca;
            border-radius: 6px;
            background: #fff1f2;
            color: #dc2626;
            font-size: 15px;
            line-height: 1;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #fee2e2;
        }

        .add-certificate {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 12px;
            padding: 8px 11px;
            color: #15803d;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 7px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        .add-certificate:hover {
            background: #dcfce7;
        }

        .empty {
            text-align: center;
            padding: 56px 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--muted);
        }

        .empty-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 14px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #eff6ff;
            color: var(--blue);
            font-size: 23px;
        }

        .empty h3 {
            font-size: 17px;
            color: var(--text);
        }

        .empty p {
            margin-top: 7px;
            font-size: 13px;
        }

        @media (max-width: 1000px) {
            .card-main {
                grid-template-columns: minmax(220px, 1.5fr) minmax(120px, 1fr) minmax(100px, 1fr);
                gap: 16px;
            }

            .actions {
                grid-column: 1 / -1;
                justify-content: flex-end;
            }
        }

        @media (max-width: 650px) {
            .navbar {
                min-height: 58px;
                padding: 0 14px;
            }

            .navbar h2 {
                font-size: 15px;
            }

            .brand {
                gap: 8px;
            }

            .brand-icon {
                width: 32px;
                height: 32px;
            }

            .back-button {
                padding: 8px 9px;
                font-size: 11px;
            }

            .container {
                padding: 20px 12px 28px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;
            }

            .page-title {
                gap: 11px;
            }

            .page-icon {
                width: 42px;
                height: 42px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 12px;
            }

            .add-button {
                width: 100%;
            }

            .filter-panel {
                padding: 10px;
            }

            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box,
            .room-filter {
                width: 100%;
                max-width: none;
            }

            .card-main {
                grid-template-columns: 1fr 1fr;
                gap: 16px 12px;
                padding: 16px 14px;
            }

            .person {
                grid-column: 1 / -1;
            }

            .person-name {
                font-size: 13px;
            }

            .actions {
                grid-column: 1 / -1;
                justify-content: stretch;
            }

            .actions>.edit-button,
            .delete-form {
                flex: 1;
            }

            .delete-form .delete-data-button {
                width: 100%;
            }

            .detail {
                padding: 14px;
            }

            .document-list {
                gap: 7px;
            }

            .document {
                flex: 0 1 auto;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="brand">
            <div class="brand-icon">K</div>
            <h2>Komite Keperawatan</h2>
        </div>
        <a href="{{ url('/dashboard') }}" class="back-button">← Dashboard</a>
    </div>

    <main class="container">
        <header class="page-header">
            <div class="page-title">
                <div class="page-icon">♙</div>
                <div>
                    <h1>Data Personal</h1>
                    <p>Kelola data personal tenaga keperawatan</p>
                </div>
            </div>
            <a href="{{ route('data-personal.create') }}" class="add-button">
                <span>＋</span> Tambah Data
            </a>
        </header>

        @if(session('success'))
            <div class="success"><span>✓</span>{{ session('success') }}</div>
        @endif

        <section class="filter-panel">
            <form action="{{ route('data-personal.index') }}" method="GET" class="filter-form">
                <div class="search-box">
                    <span class="search-icon">⌕</span>
                    <input type="text" id="searchInput" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama tenaga keperawatan..." autocomplete="off">
                </div>
                <div class="room-filter">
                    <select name="unit_kerja" onchange="this.form.submit()">
                        <option value="">Semua Ruangan</option>
                        @foreach([
                                'K IRI' => 'K IRI',
                                'MPP' => 'MPP',
                                'MUTU' => 'MUTU',
                                'PPI' => 'PPI',
                                'Catleya' => 'Catleya',
                                'Alamanda' => 'Alamanda',
                                'Gardenia' => 'Gardenia',
                                'Tulip HCU/Kamelia NIKU' => 'Tulip HCU/Kamelia NIKU',
                                'HD' => 'HD',
                                'IRJ' => 'IRJ',
                                'IBS' => 'IBS',
                                'ICU' => 'ICU',
                                'IGD' => 'IGD',
                                'Mawar' => 'Mawar',
                                'Amarylis' => 'Amarylis'
                            ] as $value => $label)
                            <option value="{{ $value }}" {{ request('unit_kerja') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </section>

        <section class="data-scroll">
            @forelse($dataPersonals as $data)
                @php
                    $roomClass = match ($data->unit_kerja) {
                        'K IRI' => 'room-k-iri',
                        'MPP' => 'room-mpp',
                        'MUTU' => 'room-mutu',
                        'PPI' => 'room-ppi',
                        'Catleya' => 'room-catleya',
                        'Alamanda' => 'room-alamanda',
                        'Gardenia' => 'room-gardenia',
                        'Tulip HCU/Kamelia NIKU' => 'room-tulip',
                        'HD' => 'room-hd',
                        'IRJ' => 'room-irj',
                        'IBS' => 'room-ibs',
                        'ICU' => 'room-icu',
                        'IGD' => 'room-igd',
                        'Mawar' => 'room-mawar',
                        'Amarylis' => 'room-amarylis',
                        default => 'room-empty',
                    };
                @endphp

                <article class="personal-card {{ $roomClass }}">
                    <div class="card-main">
                        <div class="person">
                            <div class="avatar">{{ strtoupper(substr($data->nama ?: 'N', 0, 1)) }}</div>
                            <div style="min-width:0">
                                <div class="person-name">{{ $data->nama ?: 'Nama belum diisi' }}</div>
                                <div class="person-unit">{{ $data->unit_kerja ?: 'Unit kerja belum diisi' }}</div>
                            </div>
                        </div>

                        <div>
                            <div class="info-label">NIP</div>
                            <div class="info-value">{{ $data->nip ?: '-' }}</div>
                        </div>

                        <div>
                            <div class="info-label">Jabatan</div>
                            <div class="info-value">{{ $data->jabatan ?: '-' }}</div>
                        </div>

                        <div class="actions">
                            <a href="{{ route('data-personal.edit', $data->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('data-personal.destroy', $data->id) }}" method="POST" class="delete-form"
                                onsubmit="return confirm('Yakin ingin menghapus data personal ini beserta dokumen dan sertifikat terkait?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-data-button">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="detail">
                        <div class="detail-header">
                            <div class="detail-title"><span>▣</span> Dokumen & Sertifikat</div>
                        </div>

                        <div class="document-list">
                            @foreach([
                                    'ijazah' => 'Ijazah',
                                    'str' => 'STR',
                                    'sipp_sipb' => 'SIPP/SIPB',
                                    'spk_rkk' => 'SPK/RKK',
                                    'proses_kredensial' => 'Kredensial',
                                    'sk_penempatan_kerja' => 'SK Penempatan',
                                    'uraian_tugas' => 'Uraian Tugas'
                                ] as $field => $label)
                                <div class="document">
                                    <span class="document-name">{{ $label }}</span>
                                    @if($data->{$field})
                                        <a href="{{ route('data-personal.document', [$data->id, $field]) }}" target="_blank"
                                            rel="noopener noreferrer" class="pdf-link">
                                            Buka PDF
                                        </a>
                                    @else
                                        <span class="not-available">Belum tersedia</span>
                                    @endif
                                </div>
                            @endforeach

                            @if($data->oppe)
                                <div class="document">
                                    <span class="document-name">OPPE (Dokumen Lama)</span>
                                    <a href="{{ route('data-personal.document', [$data->id, 'oppe']) }}" target="_blank"
                                        rel="noopener noreferrer" class="pdf-link">
                                        Buka PDF
                                    </a>
                                </div>
                            @endif

                            @foreach($data->oppes as $oppe)
                                <div class="document">
                                    <span class="document-name">{{ $oppe->nama_oppe }}</span>

                                    @if($oppe->link_oppe)
                                        <a href="{{ route('oppe.file', $oppe->id) }}" target="_blank" rel="noopener noreferrer"
                                            class="pdf-link">
                                            Buka Link OPPE
                                        </a>
                                    @elseif($oppe->file_oppe)
                                        <a href="{{ route('oppe.file', $oppe->id) }}" target="_blank" rel="noopener noreferrer"
                                            class="pdf-link">
                                            Buka PDF
                                        </a>
                                    @else
                                        <span class="not-available">File belum tersedia</span>
                                    @endif

                                    <form action="{{ route('oppe.destroy', $oppe->id) }}" method="POST" class="delete-form"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumen OPPE ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button" aria-label="Hapus OPPE">×</button>
                                    </form>
                                </div>
                            @endforeach

                            <div class="document">
                                <span class="document-name"></span>
                                <a href="{{ route('oppe.create', $data->id) }}" class="pdf-link">＋ Tambah OPPE</a>
                            </div>

                            @foreach($data->sertifikats as $sertifikat)
                                <div class="document certificate">
                                    <span class="document-name">{{ $sertifikat->nama_sertifikat }}</span>
                                    <a href="{{ route('sertifikat.file', $sertifikat->id) }}" target="_blank"
                                        rel="noopener noreferrer" class="pdf-link">
                                        Buka PDF
                                    </a>
                                    <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST"
                                        class="delete-form" onsubmit="return confirm('Yakin ingin menghapus sertifikat ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button" aria-label="Hapus sertifikat">×</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('sertifikat.create', $data->id) }}" class="add-certificate">
                            ＋ Tambah Sertifikat
                        </a>
                    </div>
                </article>
            @empty
                <div class="empty">
                    <div class="empty-icon">♙</div>
                    <h3>Belum Ada Data Personal</h3>
                    <p>Silakan tambahkan data personal tenaga keperawatan.</p>
                </div>
            @endforelse
        </section>
    </main>

    <script>
        (() => {
            const searchInput = document.getElementById('searchInput');
            const dataScroll = document.querySelector('.data-scroll');
            const roomSelect = document.querySelector('[name="unit_kerja"]');
            let searchTimer;
            let activeRequest;

            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimer);

                searchTimer = setTimeout(async () => {
                    const url = new URL(window.location.href);
                    const searchValue = searchInput.value.trim();
                    const unitKerja = roomSelect.value;

                    if (searchValue) url.searchParams.set('search', searchValue);
                    else url.searchParams.delete('search');

                    if (unitKerja) url.searchParams.set('unit_kerja', unitKerja);
                    else url.searchParams.delete('unit_kerja');

                    if (activeRequest) activeRequest.abort();
                    activeRequest = new AbortController();

                    try {
                        const response = await fetch(url.toString(), {
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            signal: activeRequest.signal
                        });

                        if (!response.ok) throw new Error('Gagal memuat data.');

                        const html = await response.text();
                        const parsed = new DOMParser().parseFromString(html, 'text/html');
                        const newData = parsed.querySelector('.data-scroll');

                        if (newData) dataScroll.innerHTML = newData.innerHTML;
                        window.history.replaceState({}, '', url.toString());
                    } catch (error) {
                        if (error.name !== 'AbortError') {
                            console.error('Pencarian gagal:', error);
                        }
                    }
                }, 350);
            });
        })();
    </script>
</body>

</html>