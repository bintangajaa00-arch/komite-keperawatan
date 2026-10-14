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

        html,
        body {
            height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8fbff 0%, #f1f5ff 100%);
            color: #1f2937;
            overflow: hidden;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            height: 60px;
            background: linear-gradient(135deg, #1e40af, #2563eb);
            color: white;
            padding: 0 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 12px rgba(30, 64, 175, .18);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .brand-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .16);
            border-radius: 9px;
            font-size: 17px;
            font-weight: bold;
        }

        .navbar h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, .13);
            padding: 8px 13px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, .22);
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {
            max-width: 1220px;
            height: calc(100vh - 60px);
            margin: 0 auto;
            padding: 20px 20px 15px;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 14px;
            flex-shrink: 0;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 12px;
            font-size: 21px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #172554;
            font-weight: 700;
        }

        .page-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 3px 8px rgba(37, 99, 235, .18);
            transition: .2s;
        }

        .add-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }


        /* =====================================================
           SUCCESS
        ===================================================== */

        .success {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #bbf7d0;
            padding: 9px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: 600;
            flex-shrink: 0;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-panel {
            background: rgba(255, 255, 255, .92);
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            padding: 10px;
            margin-bottom: 12px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
            flex-shrink: 0;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 520px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            height: 38px;
            padding: 0 12px 0 34px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #1f2937;
            background: #fff;
            transition: .2s;
        }

        .search-box input:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .07);
        }

        .room-filter {
            width: 240px;
        }

        .room-filter select {
            width: 100%;
            height: 38px;
            padding: 0 30px 0 12px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            outline: none;
            background: #fff;
            color: #374151;
            font-family: Arial, sans-serif;
            font-size: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .room-filter select:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .07);
        }


        /* =====================================================
           DATA SCROLL
        ===================================================== */

        .data-scroll {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            padding-right: 5px;
            padding-bottom: 15px;
        }

        .data-scroll::-webkit-scrollbar {
            width: 7px;
        }

        .data-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .data-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .data-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }


        /* =====================================================
           PERSONAL CARD
        ===================================================== */

        .personal-card {
            --room-color: #2563eb;
            --room-light: #eff6ff;
            --room-border: #dbeafe;
            --room-dark: #1d4ed8;

            position: relative;

            background: white;

            border: 1px solid #d9e1ea;

            /* WARNA RUANGAN LEBIH TERLIHAT */
            border-left: 8px solid var(--room-color);

            border-radius: 11px;

            margin-bottom: 10px;

            overflow: hidden;

            box-shadow:
                0 2px 9px rgba(15, 23, 42, .05);

            transition: .2s;
        }

        .personal-card:hover {
            border-color: var(--room-border);
            box-shadow: 0 6px 18px rgba(15, 23, 42, .08);
            transform: translateY(-1px);
        }


        /* =====================================================
   WARNA PER RUANGAN - LEBIH KONTRAS
===================================================== */

        .room-k-iri {
            --room-color: #0057b8;
            --room-light: #e6f0ff;
            --room-border: #80b5f2;
            --room-dark: #00438f;
        }

        .room-mpp {
            --room-color: #7b1fa2;
            --room-light: #f3e5f5;
            --room-border: #ce93d8;
            --room-dark: #6a1b9a;
        }

        .room-mutu {
            --room-color: #008f5a;
            --room-light: #e4f7ef;
            --room-border: #76d7ae;
            --room-dark: #006b43;
        }

        .room-ppi {
            --room-color: #d50000;
            --room-light: #ffebee;
            --room-border: #ef8a8a;
            --room-dark: #b71c1c;
        }

        .room-catleya {
            --room-color: #c2185b;
            --room-light: #fce4ec;
            --room-border: #f48fb1;
            --room-dark: #9c1249;
        }

        .room-alamanda {
            --room-color: #ef6c00;
            --room-light: #fff3e0;
            --room-border: #ffb74d;
            --room-dark: #d35400;
        }

        .room-gardenia {
            --room-color: #00796b;
            --room-light: #e0f2f1;
            --room-border: #80cbc4;
            --room-dark: #00574f;
        }

        .room-tulip {
            --room-color: #303f9f;
            --room-light: #e8eaf6;
            --room-border: #9fa8da;
            --room-dark: #283593;
        }

        .room-hd {
            --room-color: #00838f;
            --room-light: #e0f7fa;
            --room-border: #80deea;
            --room-dark: #00646e;
        }

        .room-irj {
            --room-color: #b88600;
            --room-light: #fff8d6;
            --room-border: #e5c45c;
            --room-dark: #8a6800;
        }

        .room-ibs {
            --room-color: #ad1457;
            --room-light: #fce4ec;
            --room-border: #f06292;
            --room-dark: #880e4f;
        }

        .room-icu {
            --room-color: #8e0000;
            --room-light: #ffebee;
            --room-border: #ef7777;
            --room-dark: #720000;
        }

        .room-igd {
            --room-color: #e65100;
            --room-light: #fff0e6;
            --room-border: #ff9d66;
            --room-dark: #b83f00;
        }

        .room-mawar {
            --room-color: #e91e63;
            --room-light: #fce4ec;
            --room-border: #f48fb1;
            --room-dark: #c2185b;
        }

        .room-amarylis {
            --room-color: #6a1b9a;
            --room-light: #f1e6f7;
            --room-border: #ba68c8;
            --room-dark: #4a126b;
        }

        .room-empty {
            --room-color: #546e7a;
            --room-light: #eceff1;
            --room-border: #b0bec5;
            --room-dark: #37474f;
        }


        /* =====================================================
           MAIN CARD
        ===================================================== */

        .card-main {
            padding: 13px 16px;
            display: grid;
            grid-template-columns:
                minmax(270px, 2fr) minmax(120px, 1fr) minmax(130px, 1fr) auto;
            align-items: center;
            gap: 18px;
        }


        /* =====================================================
           PERSON
        ===================================================== */

        .person {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .avatar {
            width: 39px;
            height: 39px;

            flex-shrink: 0;

            border-radius: 10px;

            background: var(--room-color);

            color: white;

            border: 2px solid var(--room-border);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;

            font-weight: 800;

            transition: .2s;

            box-shadow:
                0 3px 7px rgba(15, 23, 42, .12);
        }

        .personal-card:hover .avatar {
            transform: scale(1.04);
        }

        .person-name {
            font-size: 14px;
            font-weight: 700;
            color: #172554;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .person-unit {
            display: inline-flex;

            align-items: center;

            margin-top: 4px;

            color: white;

            font-size: 10px;

            font-weight: 800;

            background: var(--room-color);

            border: 1px solid var(--room-color);

            padding: 4px 9px;

            border-radius: 5px;

            white-space: nowrap;

            max-width: 100%;

            overflow: hidden;

            text-overflow: ellipsis;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, .10);
        }


        /* =====================================================
           INFO
        ===================================================== */

        .info-label {
            color: #94a3b8;
            font-size: 9px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: .5px;
            margin-bottom: 3px;
        }

        .info-value {
            color: #334155;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* =====================================================
           ACTION
        ===================================================== */

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .edit-button,
        .delete-data-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 58px;
            padding: 7px 10px;

            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;

            transition: .2s;
            cursor: pointer;
        }

        .edit-button {
            background: var(--room-light);
            border: 1px solid var(--room-border);
            color: var(--room-dark);
            text-decoration: none;
        }

        .edit-button:hover {
            background: var(--room-border);
        }

        .delete-data-button {
            background: #fff1f2;
            border: 1px solid #ffe4e6;
            color: #dc2626;
            font-family: Arial, sans-serif;
        }

        .delete-data-button:hover {
            background: #fee2e2;
            border-color: #fecaca;
            color: #b91c1c;
        }

        .delete-form {
            display: inline-flex;
            margin: 0;
        }


        /* =====================================================
           DETAIL
        ===================================================== */

        .detail {
            border-top: 1px solid #f1f5f9;
            padding: 10px 16px 12px;
            background: linear-gradient(to bottom, #ffffff, #fcfdff);
        }

        .detail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .detail-title {
            display: flex;
            align-items: center;
            gap: 6px;

            font-size: 10px;
            font-weight: 800;

            color: var(--room-dark);

            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .detail-title span {
            color: var(--room-color);
        }


        /* =====================================================
           DOCUMENT
        ===================================================== */

        .document-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .document {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 5px 8px;

            border: 1px solid #e2e8f0;
            background: #f8fafc;

            border-radius: 6px;

            font-size: 10px;
            min-height: 28px;
        }

        .document-name {
            color: #64748b;
            font-weight: 700;
            font-size: 10px;
        }

        .pdf-link {
            color: var(--room-dark);

            text-decoration: none;

            font-size: 10px;
            font-weight: 800;

            padding: 2px 5px;

            background: var(--room-light);

            border-radius: 4px;
        }

        .pdf-link:hover {
            text-decoration: underline;
            background: var(--room-border);
        }

        .not-available {
            color: #cbd5e1;
            font-size: 10px;
        }


        /* =====================================================
           SERTIFIKAT
        ===================================================== */

        .certificate {
            background: #f0fdf4;
            border-color: #dcfce7;
        }

        .certificate .document-name {
            color: #15803d;
        }

        .certificate .pdf-link {
            color: #15803d;
            background: #dcfce7;
        }

        .delete-button {
            border: none;
            background: #fee2e2;
            color: #dc2626;

            width: 19px;
            height: 19px;

            border-radius: 4px;

            cursor: pointer;

            font-size: 11px;
            font-weight: 800;

            line-height: 19px;
            padding: 0;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .add-certificate {
            display: inline-flex;
            align-items: center;

            margin-top: 7px;

            color: #15803d;
            background: #f0fdf4;
            border: 1px solid #dcfce7;

            padding: 5px 8px;

            border-radius: 5px;

            text-decoration: none;

            font-size: 10px;
            font-weight: 800;

            transition: .2s;
        }

        .add-certificate:hover {
            background: #dcfce7;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            text-align: center;
            padding: 45px 20px;
            color: #64748b;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eff6ff;
            color: #2563eb;

            border-radius: 12px;

            font-size: 20px;
        }

        .empty h3 {
            font-size: 16px;
            color: #334155;
        }

        .empty p {
            margin-top: 5px;
            font-size: 12px;
        }


        /* =====================================================
           HEIGHT PENDEK
        ===================================================== */

        @media (max-height: 760px) and (min-width: 901px) {

            .container {
                padding-top: 12px;
            }

            .page-header {
                margin-bottom: 9px;
            }

            .page-icon {
                width: 40px;
                height: 40px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .filter-panel {
                margin-bottom: 8px;
                padding: 8px;
            }

            .card-main {
                padding: 10px 14px;
            }

            .detail {
                padding: 8px 14px 9px;
            }

            .personal-card {
                margin-bottom: 7px;
            }
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 900px) {

            .card-main {
                grid-template-columns:
                    minmax(230px, 2fr) minmax(100px, 1fr) auto;
            }

            .actions {
                grid-column: 3;
            }

            .room-filter {
                width: 210px;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 650px) {

            body {
                overflow: hidden;
            }

            .navbar {
                height: 56px;
                padding: 0 16px;
            }

            .navbar h2 {
                font-size: 16px;
            }

            .brand-icon {
                width: 30px;
                height: 30px;
            }

            .back-button {
                padding: 7px 9px;
                font-size: 11px;
            }

            .container {
                height: calc(100vh - 56px);
                padding: 14px 10px 10px;
            }

            .page-header {
                flex-wrap: wrap;
                gap: 9px;
                margin-bottom: 10px;
            }

            .page-title {
                width: 100%;
            }

            .page-icon {
                width: 40px;
                height: 40px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .page-header p {
                font-size: 11px;
            }

            .add-button {
                width: 100%;
            }

            .filter-panel {
                padding: 8px;
            }

            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: none;
            }

            .room-filter {
                width: 100%;
            }

            .card-main {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .person {
                grid-column: 1 / -1;
            }

            .actions {
                grid-column: 1 / -1;
                width: 100%;
            }

            .edit-button,
            .delete-data-button {
                flex: 1;
            }

            .delete-form {
                flex: 1;
            }

            .delete-form .delete-data-button {
                width: 100%;
            }
        }
    </style>
</head>


<body>

    {{-- =====================================================
    NAVBAR
    ====================================================== --}}

    <div class="navbar">

        <div class="brand">

            <div class="brand-icon">
                K
            </div>

            <h2>
                Komite Keperawatan
            </h2>

        </div>

        <a href="{{ url('/dashboard') }}" class="back-button">
            ← Dashboard
        </a>

    </div>


    {{-- =====================================================
    CONTAINER
    ====================================================== --}}

    <div class="container">

        {{-- HEADER --}}

        <div class="page-header">

            <div class="page-title">

                <div class="page-icon">
                    ♙
                </div>

                <div>

                    <h1>
                        Data Personal
                    </h1>

                    <p>
                        Kelola data personal tenaga keperawatan
                    </p>

                </div>

            </div>

            <a href="{{ route('data-personal.create') }}" class="add-button">
                <span>＋</span>
                Tambah Data
            </a>

        </div>


        {{-- SUCCESS --}}

        @if(session('success'))

            <div class="success">

                <span>✓</span>

                {{ session('success') }}

            </div>

        @endif


        {{-- FILTER --}}

        <div class="filter-panel">

            <form action="{{ route('data-personal.index') }}" method="GET" class="filter-form">

                <div class="search-box">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input type="text" id="searchInput" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama tenaga keperawatan..." autocomplete="off">

                </div>


                <div class="room-filter">

                    <select name="unit_kerja" onchange="this.form.submit()">

                        <option value="">
                            Semua Ruangan
                        </option>

                        <option value="K IRI" {{ request('unit_kerja') == 'K IRI' ? 'selected' : '' }}>
                            K IRI
                        </option>

                        <option value="MPP" {{ request('unit_kerja') == 'MPP' ? 'selected' : '' }}>
                            MPP
                        </option>

                        <option value="MUTU" {{ request('unit_kerja') == 'MUTU' ? 'selected' : '' }}>
                            MUTU
                        </option>

                        <option value="PPI" {{ request('unit_kerja') == 'PPI' ? 'selected' : '' }}>
                            PPI
                        </option>

                        <option value="Catleya" {{ request('unit_kerja') == 'Catleya' ? 'selected' : '' }}>
                            Catleya
                        </option>

                        <option value="Alamanda" {{ request('unit_kerja') == 'Alamanda' ? 'selected' : '' }}>
                            Alamanda
                        </option>

                        <option value="Gardenia" {{ request('unit_kerja') == 'Gardenia' ? 'selected' : '' }}>
                            Gardenia
                        </option>

                        <option value="Tulip HCU/Kamelia NIKU" {{ request('unit_kerja') == 'Tulip HCU/Kamelia NIKU' ? 'selected' : '' }}>
                            Tulip HCU/Kamelia NIKU
                        </option>

                        <option value="HD" {{ request('unit_kerja') == 'HD' ? 'selected' : '' }}>
                            HD
                        </option>

                        <option value="IRJ" {{ request('unit_kerja') == 'IRJ' ? 'selected' : '' }}>
                            IRJ
                        </option>

                        <option value="IBS" {{ request('unit_kerja') == 'IBS' ? 'selected' : '' }}>
                            IBS
                        </option>

                        <option value="ICU" {{ request('unit_kerja') == 'ICU' ? 'selected' : '' }}>
                            ICU
                        </option>

                        <option value="IGD" {{ request('unit_kerja') == 'IGD' ? 'selected' : '' }}>
                            IGD
                        </option>

                        <option value="Mawar" {{ request('unit_kerja') == 'Mawar' ? 'selected' : '' }}>
                            Mawar
                        </option>

                        <option value="Amarylis" {{ request('unit_kerja') == 'Amarylis' ? 'selected' : '' }}>
                            Amarylis
                        </option>

                    </select>

                </div>

            </form>

        </div>


        {{-- DATA --}}

        <div class="data-scroll">

            @if($dataPersonals->count() > 0)

                @foreach($dataPersonals as $data)

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

                    <div class="personal-card {{ $roomClass }}">

                        {{-- INFORMASI UTAMA --}}

                        <div class="card-main">

                            {{-- PERSON --}}

                            <div class="person">

                                <div class="avatar">

                                    {{ strtoupper(substr($data->nama ?: 'N', 0, 1)) }}

                                </div>

                                <div style="min-width:0;">

                                    <div class="person-name">

                                        {{ $data->nama ?: 'Nama belum diisi' }}

                                    </div>

                                    <div class="person-unit">

                                        {{ $data->unit_kerja ?: 'Unit kerja belum diisi' }}

                                    </div>

                                </div>

                            </div>


                            {{-- NIP --}}

                            <div>

                                <div class="info-label">
                                    NIP
                                </div>

                                <div class="info-value">

                                    {{ $data->nip ?: '-' }}

                                </div>

                            </div>


                            {{-- JABATAN --}}

                            <div>

                                <div class="info-label">
                                    Jabatan
                                </div>

                                <div class="info-value">

                                    {{ $data->jabatan ?: '-' }}

                                </div>

                            </div>


                            {{-- ACTION --}}

                            <div class="actions">

                                <a href="{{ route('data-personal.edit', $data->id) }}" class="edit-button">
                                    Edit
                                </a>

                                <form action="{{ route('data-personal.destroy', $data->id) }}" method="POST" class="delete-form"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data personal ini? Semua dokumen dan sertifikat yang terkait juga akan dihapus.');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-data-button">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>


                        {{-- DETAIL DOKUMEN --}}

                        <div class="detail">

                            <div class="detail-header">

                                <div class="detail-title">

                                    <span>▣</span>

                                    Dokumen & Sertifikat

                                </div>

                            </div>


                            <div class="document-list">

                                {{-- IJAZAH --}}

                                <div class="document">

                                    <span class="document-name">
                                        Ijazah
                                    </span>

                                    @if($data->ijazah)

                                        <a href="{{ asset('storage/' . $data->ijazah) }}" target="_blank" class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- STR --}}

                                <div class="document">

                                    <span class="document-name">
                                        STR
                                    </span>

                                    @if($data->str)

                                        <a href="{{ asset('storage/' . $data->str) }}" target="_blank" class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- SIPP/SIPB --}}

                                <div class="document">

                                    <span class="document-name">
                                        SIPP/SIPB
                                    </span>

                                    @if($data->sipp_sipb)

                                        <a href="{{ asset('storage/' . $data->sipp_sipb) }}" target="_blank" class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- SPK/RKK --}}

                                <div class="document">

                                    <span class="document-name">
                                        SPK/RKK
                                    </span>

                                    @if($data->spk_rkk)

                                        <a href="{{ asset('storage/' . $data->spk_rkk) }}" target="_blank" class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- KREDENSIAL --}}

                                <div class="document">

                                    <span class="document-name">
                                        Kredensial
                                    </span>

                                    @if($data->proses_kredensial)

                                        <a href="{{ asset('storage/' . $data->proses_kredensial) }}" target="_blank"
                                            class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- SK PENEMPATAN --}}

                                <div class="document">

                                    <span class="document-name">
                                        SK Penempatan
                                    </span>

                                    @if($data->sk_penempatan_kerja)

                                        <a href="{{ asset('storage/' . $data->sk_penempatan_kerja) }}" target="_blank"
                                            class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- URAIAN TUGAS --}}

                                <div class="document">

                                    <span class="document-name">
                                        Uraian Tugas
                                    </span>

                                    @if($data->uraian_tugas)

                                        <a href="{{ asset('storage/' . $data->uraian_tugas) }}" target="_blank" class="pdf-link">
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>


                                {{-- OPPE --}}

                                <div class="document">

                                    <span class="document-name">
                                        OPPE
                                    </span>

                                    @if($data->oppe)

                                        <a href="{{ asset('storage/' . $data->oppe) }}" target="_blank" class="pdf-link"
                                            rel="noopener noreferrer" download>
                                            Unduh PDF
                                        </a>

                                    @else

                                        <span class="not-available">
                                            —
                                        </span>

                                    @endif

                                </div>

                                {{-- SERTIFIKAT --}}

                                @foreach($data->sertifikats as $sertifikat)

                                    <div class="document certificate">

                                        <span class="document-name">

                                            {{ $sertifikat->nama_sertifikat }}

                                        </span>

                                        <a href="{{ asset('storage/' . $sertifikat->file_sertifikat) }}" target="_blank"
                                            class="pdf-link">
                                            Unduh PDF
                                        </a>

                                        <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST"
                                            class="delete-form" onsubmit="return confirm('Yakin ingin menghapus sertifikat ini?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-button">
                                                ×
                                            </button>

                                        </form>

                                    </div>

                                @endforeach

                            </div>


                            {{-- TAMBAH SERTIFIKAT --}}

                            <a href="{{ route('sertifikat.create', $data->id) }}" class="add-certificate">
                                ＋ Tambah Sertifikat
                            </a>

                        </div>

                    </div>

                @endforeach

            @else

                <div class="empty">

                    <div class="empty-icon">
                        ♙
                    </div>

                    <h3>
                        Belum Ada Data Personal
                    </h3>

                    <p>
                        Silakan tambahkan data personal tenaga keperawatan.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- =====================================================
    LIVE SEARCH
    ====================================================== --}}

    <script>

        const searchInput =
            document.getElementById('searchInput');

        const dataScroll =
            document.querySelector('.data-scroll');

        let searchTimer;


        searchInput.addEventListener(
            'input',
            function () {

                clearTimeout(searchTimer);

                searchTimer = setTimeout(
                    function () {

                        const searchValue =
                            searchInput.value.trim();

                        const unitKerja =
                            document.querySelector(
                                '[name="unit_kerja"]'
                            ).value;

                        const url =
                            new URL(
                                window.location.href
                            );


                        if (searchValue !== '') {

                            url.searchParams.set(
                                'search',
                                searchValue
                            );

                        } else {

                            url.searchParams.delete(
                                'search'
                            );

                        }


                        if (unitKerja !== '') {

                            url.searchParams.set(
                                'unit_kerja',
                                unitKerja
                            );

                        } else {

                            url.searchParams.delete(
                                'unit_kerja'
                            );

                        }


                        fetch(
                            url.toString(),
                            {
                                headers: {
                                    'X-Requested-With':
                                        'XMLHttpRequest'
                                }
                            }
                        )

                            .then(
                                response =>
                                    response.text()
                            )

                            .then(
                                html => {

                                    const parser =
                                        new DOMParser();

                                    const documentResult =
                                        parser.parseFromString(
                                            html,
                                            'text/html'
                                        );

                                    const newDataScroll =
                                        documentResult.querySelector(
                                            '.data-scroll'
                                        );

                                    if (newDataScroll) {

                                        dataScroll.innerHTML =
                                            newDataScroll.innerHTML;

                                    }

                                    searchInput.focus();

                                    const cursorPosition =
                                        searchInput.value.length;

                                    searchInput.setSelectionRange(
                                        cursorPosition,
                                        cursorPosition
                                    );

                                }
                            )

                            .catch(
                                error => {

                                    console.error(
                                        'Terjadi kesalahan saat mencari data:',
                                        error
                                    );

                                }
                            );

                    },
                    500
                );

            }
        );

    </script>

</body>

</html>