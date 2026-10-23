<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Personal | Komite Keperawatan</title>

    <style>
        :root {
            --navy: #103968;
            --navy-dark: #09294d;
            --blue: #1764f5;
            --blue-light: #eaf1ff;
            --teal: #0e9f91;
            --green: #0c9b72;
            --purple: #8051e8;
            --orange: #f28a25;
            --red: #f04463;
            --text: #203653;
            --muted: #71839d;
            --border: #dce6f3;
            --bg: #f3f7fd;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        button,
        input,
        select {
            font: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* HEADER TETAP DI ATAS */

        .topbar {
            position: fixed;
            inset: 0 0 auto;
            z-index: 1000;
            height: 56px;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 8px 25px;
            color: white;
            background: linear-gradient(110deg, var(--navy-dark), #174b86);
            box-shadow: 0 3px 12px #09294d20;
        }

        .brand-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: white;
            background: linear-gradient(135deg, #14c9c0, #0879d9);
            border-radius: 11px;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            min-width: 175px;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.35;
        }

        .brand-name small {
            display: block;
            color: #c5d7ee;
            font-size: 11px;
            font-weight: 500;
        }

        .top-search {
            width: min(420px, 40vw);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 35px;
            padding: 10px 13px;
            background: #ffffff18;
            border: 1px solid #ffffff20;
            border-radius: 9px;
        }

        .top-search span {
            color: #d5e5ff;
            font-size: 19px;
        }

        .top-search input {
            width: 100%;
            padding: 0;
            color: white;
            background: transparent;
            border: 0;
            outline: 0;
            font-size: 12px;
        }

        .top-search input::placeholder {
            color: #c3d3e9;
        }

        .top-user {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-left: auto;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            display: grid;
            place-items: center;
            background: #3679c8;
            border: 1px solid #ffffff40;
            border-radius: 50%;
            font-weight: 800;
        }

        /* AREA HALAMAN TIDAK IKUT SCROLL */

        .page {
            position: fixed;
            top: 56px;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 1800px;
            margin: 0 auto;
            padding: 20px 25px 18px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            overflow: hidden;
        }

        .page-heading,
        .filter-panel {
            flex-shrink: 0;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            min-height: 65px;
        }

        .heading-left {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .heading-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--blue);
            background: linear-gradient(135deg, #e3edff, #d3e4ff);
            border: 1px solid #cbdcff;
            border-radius: 15px;
            font-size: 26px;
        }

        .eyebrow {
            margin: 0 0 4px;
            color: var(--blue);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.2px;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: 26px;
            font-weight: 850;
            letter-spacing: -.5px;
        }

        .subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .btn {
            min-height: 37px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 14px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 750;
            white-space: nowrap;
            cursor: pointer;
            transition: .18s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, #2874ff, #1454d5);
            box-shadow: 0 4px 10px #1764f526;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #155fe9, #1045b5);
        }

        .btn-light {
            color: #355578;
            background: white;
            border-color: var(--border);
        }

        .alert {
            flex-shrink: 0;
            padding: 10px 14px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 650;
        }

        .alert-success {
            color: #087657;
            background: #e5f8ef;
            border: 1px solid #bcebd5;
        }

        .alert-error {
            color: #bd304e;
            background: #fff0f3;
            border: 1px solid #ffd5de;
        }

        /* PANEL PENCARIAN TETAP */

        .filter-panel {
            padding: 15px 18px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 4px 14px #1b3b6308;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 12px;
            color: var(--navy);
            font-size: 14px;
            font-weight: 850;
        }

        .section-icon {
            width: 30px;
            height: 30px;
            display: inline-grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--blue);
            background: var(--blue-light);
            border-radius: 8px;
            font-size: 16px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: minmax(200px, 1.2fr) minmax(200px, 1fr) auto;
            gap: 12px;
            align-items: end;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            color: #536b8a;
            font-size: 12px;
            font-weight: 750;
        }

        .control {
            width: 100%;
            height: 41px;
            padding: 0 12px;
            color: var(--text);
            background: #fbfcff;
            border: 1px solid #d9e4f2;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
        }

        .control:focus {
            background: white;
            border-color: #6d9eff;
            box-shadow: 0 0 0 3px #1764f51c;
        }

        .search-wrap {
            position: relative;
        }

        .search-wrap .control {
            padding-left: 37px;
        }

        .search-symbol {
            position: absolute;
            top: 50%;
            left: 13px;
            color: #6d83a3;
            font-size: 17px;
            transform: translateY(-50%);
        }

        .filter-actions {
            display: flex;
            gap: 7px;
        }

        /* PANEL TABEL MEMENUHI RUANG YANG TERSISA */

        .table-panel {
            flex: 1;
            min-height: 0;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 4px 15px #1b3b6308;
        }

        .table-heading {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 18px;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .table-heading-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-heading h2 {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: 850;
        }

        .table-heading p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .count-badge {
            padding: 8px 11px;
            color: #1556ca;
            background: #eaf1ff;
            border: 1px solid #d4e3ff;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 850;
            white-space: nowrap;
        }

        /* INI SATU-SATUNYA AREA SCROLL VERTIKAL */

        .table-scroll {
            flex: 1;
            min-height: 0;
            width: 100%;
            overflow-y: auto;
            overflow-x: auto;
            overscroll-behavior: contain;
            scrollbar-width: thin;
            scrollbar-color: #9bb4d6 #edf2fa;
            padding: 0 12px;
        }

        .table-scroll::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .table-scroll::-webkit-scrollbar-track {
            background: #edf2fa;
        }

        .table-scroll::-webkit-scrollbar-thumb {
            background: #9bb4d6;
            border-radius: 10px;
        }

        .table-scroll::-webkit-scrollbar-thumb:hover {
            background: #6489bb;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
        }

        thead {
            background: linear-gradient(100deg, #103968, #17538f);
        }

        thead th {
            position: sticky;
            top: 0;
            z-index: 5;
            padding: 13px 12px;
            color: white;
            background: #103968;
            border-bottom: 1px solid #244f7d;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        thead th:first-child {
            border-radius: 7px 0 0 7px;
        }

        thead th:last-child {
            border-radius: 0 7px 7px 0;
        }

        td {
            padding: 11px 12px;
            color: #435a77;
            border-bottom: 1px solid #eaf0f7;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background: #f8faff;
        }

        tbody tr:hover {
            background: #edf4ff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .row-number {
            width: 45px;
            color: #7286a2;
            font-weight: 800;
        }

        .person-cell {
            min-width: 225px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .person-avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: #1459da;
            background: linear-gradient(135deg, #e6eeff, #c9dcff);
            border: 1px solid #d0dfff;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 900;
        }

        .person-name {
            display: block;
            margin-bottom: 4px;
            color: #263e5e;
            font-size: 12px;
            font-weight: 850;
            line-height: 1.45;
        }

        .person-nip {
            display: block;
            color: #8393aa;
            font-size: 11px;
        }

        .unit-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border: 1px solid #d5e3ff;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 850;
            white-space: nowrap;
        }

        .unit-badge::before {
            content: "";
            width: 6px;
            height: 6px;
            background: currentColor;
            border-radius: 50%;
        }

        .job-text {
            min-width: 100px;
            color: #526782;
            font-weight: 650;
        }

        .doc-badges {
            min-width: 150px;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .doc-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 7px;
            color: #48617e;
            background: #eef3fb;
            border: 1px solid #e0e8f5;
            border-radius: 6px;
            font-size: 10px;
            white-space: nowrap;
        }

        .doc-badge.blue {
            color: #145de0;
            background: #e8f0ff;
            border-color: #d7e5ff;
        }

        .doc-badge.orange {
            color: #d97512;
            background: #fff1e2;
            border-color: #ffe1c2;
        }

        .doc-badge.green {
            color: #078466;
            background: #e2f8ef;
            border-color: #c7efdf;
        }

        .action-cell {
            min-width: 145px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-grid;
            place-items: center;
            color: white;
            background: var(--blue);
            border: 1px solid var(--blue);
            border-radius: 7px;
            font-size: 15px;
            cursor: pointer;
            transition: .15s;
        }

        .action-btn:hover {
            filter: brightness(.9);
            transform: translateY(-1px);
        }

        .action-btn.edit {
            background: var(--purple);
            border-color: var(--purple);
        }

        .action-btn.delete {
            background: var(--red);
            border-color: var(--red);
        }

        .action-buttons form {
            margin: 0;
        }

        .pagination-info {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 11px 18px;
            color: var(--muted);
            background: #fbfcff;
            border-top: 1px solid var(--border);
            font-size: 11px;
        }

        .empty-state {
            padding: 42px 15px;
            color: var(--muted);
            text-align: center;
        }

        .empty-icon {
            width: 53px;
            height: 53px;
            display: grid;
            place-items: center;
            margin: 0 auto 12px;
            color: var(--blue);
            background: #e8f0ff;
            border-radius: 15px;
            font-size: 25px;
        }

        .empty-state h3 {
            margin: 0 0 7px;
            color: var(--navy);
            font-size: 16px;
        }

        /* DETAIL DOKUMEN */

        .document-source {
            padding: 12px;
            background: #fff;
            border-radius: 8px;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            background: #071e3b9c;
            backdrop-filter: blur(4px);
        }

        .modal-backdrop.show {
            display: flex;
        }

        .modal {
            width: min(760px, 100%);
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: white;
            border: 1px solid #dbe6f4;
            border-radius: 15px;
            box-shadow: 0 24px 80px #061d3c50;
        }

        .modal-header {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 19px 22px;
            color: white;
            background: linear-gradient(115deg, #0c315b, #1b5ba0);
        }

        .modal-header h2 {
            margin: 0;
            font-size: 17px;
            font-weight: 850;
        }

        .modal-header p {
            margin: 5px 0 0;
            color: #d0e2f8;
            font-size: 12px;
        }

        .modal-close {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            color: white;
            background: #ffffff20;
            border: 1px solid #ffffff35;
            border-radius: 8px;
            font-size: 23px;
            cursor: pointer;
        }

        .modal-body {
            padding: 19px 22px 23px;
            overflow-y: auto;
        }

        .modal-section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 5px 0 11px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 850;
        }

        .modal-section-title .section-icon {
            width: 27px;
            height: 27px;
        }

        .document-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 9px;
        }

        .document-item {
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: #fbfcff;
            border: 1px solid #e0e9f5;
            border-radius: 9px;
            transition: .15s;
        }

        .document-item:hover {
            background: #f1f6ff;
            border-color: #cbdcff;
        }

        .document-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--blue);
            background: #e7efff;
            border-radius: 9px;
            font-size: 17px;
        }

        .document-icon.green {
            color: var(--green);
            background: #ddf7ed;
        }

        .document-icon.purple {
            color: var(--purple);
            background: #eee6ff;
        }

        .document-icon.orange {
            color: var(--orange);
            background: #fff0dd;
        }

        .document-info {
            flex: 1;
            min-width: 0;
        }

        .document-name {
            display: block;
            color: #344d6d;
            font-size: 12px;
            font-weight: 850;
            overflow-wrap: anywhere;
        }

        .document-status {
            display: block;
            margin-top: 4px;
            color: #8a98ac;
            font-size: 10px;
        }

        .document-status.available {
            color: var(--green);
        }

        .document-status.unavailable {
            color: var(--red);
        }

        .document-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            color: white;
            background: var(--blue);
            border-radius: 6px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .document-link:hover {
            background: #124dc9;
        }

        .document-empty {
            grid-column: 1 / -1;
            padding: 17px;
            color: #7b8da6;
            background: #f8faff;
            border: 1px dashed #d5e1f0;
            border-radius: 9px;
            text-align: center;
            font-size: 12px;
        }

        .modal-add-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 11px;
        }

        .modal-divider {
            height: 1px;
            margin: 19px 0;
            background: #e6edf7;
        }

        @media (min-width: 1450px) {
            .page {
                padding-left: 34px;
                padding-right: 34px;
            }

            td {
                padding-top: 13px;
                padding-bottom: 13px;
            }
        }

        @media (max-width: 1050px) {
            .page {
                padding: 17px 15px 14px;
                gap: 11px;
            }

            .filter-grid {
                grid-template-columns: 1fr 1fr;
            }

            .filter-actions {
                grid-column: 1 / -1;
                justify-content: flex-end;
            }

            .top-search {
                margin-left: 5px;
            }
        }

        @media (max-width: 650px) {
            .topbar {
                padding: 9px 12px;
                gap: 8px;
            }

            .brand-name {
                display: none;
            }

            .top-search {
                width: 100%;
                margin-left: 0;
            }

            .top-user {
                gap: 5px;
            }

            .top-user>span {
                display: none;
            }

            .page {
                padding: 13px 10px 10px;
                gap: 10px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .heading-icon {
                width: 42px;
                height: 42px;
            }

            h1 {
                font-size: 21px;
            }

            .subtitle {
                max-width: 230px;
                line-height: 1.5;
            }

            .page-heading>.btn {
                padding: 9px;
                font-size: 10px;
            }

            .filter-panel {
                padding: 12px;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                grid-column: auto;
            }

            .table-heading {
                padding: 11px;
            }

            .table-scroll {
                padding: 0 7px;
            }

            .document-list {
                grid-template-columns: 1fr;
            }

            .pagination-info {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-height: 720px) and (min-width: 651px) {
            .page {
                padding-top: 12px;
                padding-bottom: 10px;
                gap: 9px;
            }

            .page-heading {
                min-height: 54px;
            }

            .heading-icon {
                width: 43px;
                height: 43px;
            }

            h1 {
                font-size: 23px;
            }

            .filter-panel {
                padding: 11px 15px;
            }

            .section-heading {
                margin-bottom: 8px;
            }

            .control {
                height: 36px;
            }

            .table-heading {
                padding: 10px 15px;
            }

            th {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            td {
                padding-top: 8px;
                padding-bottom: 8px;
            }

            .person-avatar {
                width: 34px;
                height: 34px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <div class="brand-icon">✚</div>

        <div class="brand-name">
            Komite Keperawatan
            <small>Rumah Sakit</small>
        </div>

        <div class="top-search">
            <span>⌕</span>
            <input id="topSearch" type="text" placeholder="Cari nama, NIP, jabatan..." autocomplete="off">
        </div>

        <div class="top-user">
            <div class="user-avatar">AD</div>
            <span>Admin　⌄</span>
        </div>
    </header>

    <main class="page">

        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                ! {{ session('error') }}
            </div>
        @endif

        <section class="page-heading">
            <div class="heading-left">
                <div class="heading-icon">♙</div>

                <div>
                    <p class="eyebrow">DATA PERSONAL</p>
                    <h1>Data Personal</h1>
                    <p class="subtitle">
                        Kelola data tenaga keperawatan dan kelengkapan dokumen secara terstruktur.
                    </p>
                </div>
            </div>

            <a href="{{ route('data-personal.create') }}" class="btn btn-primary">
                ＋ Tambah Data Personal
            </a>
        </section>

        <section class="filter-panel">
            <div class="section-heading">
                <span class="section-icon">⌕</span>
                Pencarian dan Filter Data
            </div>

            <form action="{{ route('data-personal.index') }}" method="GET" id="filterForm">
                <div class="filter-grid">

                    <div class="field">
                        <label for="search">Cari Data Personal</label>

                        <div class="search-wrap">
                            <span class="search-symbol">⌕</span>

                            <input class="control" type="text" id="search" name="search" value="{{ request('search') }}"
                                placeholder="Cari nama, NIP, atau jabatan..." autocomplete="off">
                        </div>
                    </div>

                    <div class="field">
                        <label for="unit_kerja">Unit Kerja</label>

                        <select class="control" id="unit_kerja" name="unit_kerja">
                            <option value="">Semua Unit Kerja</option>

                            @foreach([
                                    'K IRI',
                                    'MUTU/MPP/Pengaduan',
                                    'PPI',
                                    'Catleya',
                                    'Alamanda',
                                    'Gardenia',
                                    'Tulip HCU/Kamelia NIKU',
                                    'HD',
                                    'IRJ',
                                    'IBS',
                                    'ICU',
                                    'IGD',
                                    'Mawar',
                                    'Amarylis',
                                    'Supervisor'
                                ] as $unit)
                                <option value="{{ $unit }}" {{ request('unit_kerja') === $unit ? 'selected' : '' }}>
                                    {{ $unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="btn btn-primary" type="submit">
                            ⌕ Cari
                        </button>

                        <a href="{{ route('data-personal.index') }}" class="btn btn-light">
                            ↺ Reset
                        </a>
                    </div>

                </div>
            </form>
        </section>

        <section class="table-panel">

            <div class="table-heading">
                <div class="table-heading-left">
                    <span class="section-icon">▤</span>

                    <div>
                        <h2>Daftar Tenaga Keperawatan</h2>
                        <p>Data personal, unit kerja, jabatan, dan ringkasan dokumen.</p>
                    </div>
                </div>

                <span class="count-badge">
                    <span id="totalData">{{ $dataPersonals->count() }}</span> Data
                </span>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>DATA PERSONAL</th>
                            <th>UNIT KERJA</th>
                            <th>JABATAN</th>
                            <th>DOKUMEN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody id="staffTableBody">

                        @forelse($dataPersonals as $data)

                            @php
                                $parts = preg_split('/\s+/', trim($data->nama ?? 'P'));

                                $initial = strtoupper(
                                    mb_substr($parts[0] ?? 'P', 0, 1) .
                                    (isset($parts[1]) ? mb_substr($parts[1], 0, 1) : '')
                                );

                                $documents = [
                                    ['field' => 'ijazah', 'label' => 'Ijazah', 'color' => 'blue'],
                                    ['field' => 'str', 'label' => 'STR', 'color' => 'green'],
                                    ['field' => 'sipp_sipb', 'label' => 'SIPP / SIPB', 'color' => 'purple'],
                                    ['field' => 'spk_rkk', 'label' => 'SPK / RKK', 'color' => 'orange'],
                                    ['field' => 'proses_kredensial', 'label' => 'Proses Kredensial', 'color' => 'purple'],
                                    ['field' => 'sk_penempatan_kerja', 'label' => 'SK Penempatan Kerja', 'color' => 'green'],
                                    ['field' => 'uraian_tugas', 'label' => 'Uraian Tugas', 'color' => 'orange'],
                                ];

                                $documentCount = collect($documents)
                                    ->filter(fn($doc) => !empty($data->{$doc['field']}))
                                    ->count();

                                $oppeCount = $data->oppes ? $data->oppes->count() : 0;
                                $certificateCount = $data->sertifikats ? $data->sertifikats->count() : 0;

                                $unitColor = match ($data->unit_kerja) {
                                    'K IRI' => '#1764f5',
                                    'MPP' => '#8051e8',
                                    'MUTU' => '#0e9f91',
                                    'PPI' => '#0d9488',
                                    'Catleya' => '#f28a25',
                                    'Alamanda' => '#d946a6',
                                    'Gardenia' => '#65a30d',
                                    'Tulip HCU/Kamelia NIKU' => '#9b4fd3',
                                    'HD' => '#0891b2',
                                    'IRJ' => '#ea7b20',
                                    'IBS' => '#7c5ce0',
                                    'ICU' => '#e04463',
                                    'IGD' => '#f04463',
                                    'Mawar' => '#d946a6',
                                    'Amarylis' => '#65a30d',
                                    default => '#1764f5',
                                };
                            @endphp

                            <tr>
                                <td class="row-number">{{ $loop->iteration }}</td>

                                <td>
                                    <div class="person-cell">
                                        <div class="person-avatar">{{ $initial }}</div>

                                        <div>
                                            <span class="person-name">{{ $data->nama }}</span>
                                            <span class="person-nip">
                                                NIP: {{ $data->nip ?: 'Belum diisi' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="unit-badge"
                                        style="color:{{ $unitColor }};background:{{ $unitColor }}12;border-color:{{ $unitColor }}30">
                                        {{ $data->unit_kerja ?: 'Belum diisi' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="job-text">
                                        {{ $data->jabatan ?: 'Belum diisi' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="doc-badges">
                                        <span class="doc-badge blue">
                                            ▤ {{ $documentCount }} Dokumen
                                        </span>

                                        <span class="doc-badge orange">
                                            ▧ {{ $oppeCount }} OPPE
                                        </span>

                                        <span class="doc-badge green">
                                            ✧ {{ $certificateCount }} Sertifikat
                                        </span>
                                    </div>
                                </td>

                                <td class="action-cell">
                                    <div class="action-buttons">

                                        <button type="button" class="action-btn" title="Lihat dokumen"
                                            aria-label="Lihat dokumen {{ $data->nama }}"
                                            onclick="openDocuments('documents-{{ $data->id }}')">
                                            ◉
                                        </button>

                                        <a href="{{ route('data-personal.edit', $data->id) }}" class="action-btn edit"
                                            title="Edit data" aria-label="Edit {{ $data->nama }}">
                                            ✎
                                        </a>

                                        <form action="{{ route('data-personal.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data personal ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="action-btn delete" type="submit" title="Hapus data"
                                                aria-label="Hapus {{ $data->nama }}">
                                                ×
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                            <tr id="documents-{{ $data->id }}" hidden>
                                <td colspan="6">
                                    <div class="document-source">

                                        <div class="modal-section-title">
                                            <span class="section-icon">▤</span>
                                            Dokumen Kepegawaian
                                        </div>

                                        <div class="document-list">

                                            @foreach($documents as $doc)
                                                <div class="document-item">

                                                    <span class="document-icon {{ $doc['color'] }}">
                                                        ▤
                                                    </span>

                                                    <div class="document-info">
                                                        <span class="document-name">
                                                            {{ $doc['label'] }}
                                                        </span>

                                                        <span
                                                            class="document-status {{ $data->{$doc['field']} ? 'available' : 'unavailable' }}">
                                                            {{ $data->{$doc['field']} ? '● Dokumen tersedia' : '● Belum tersedia' }}
                                                        </span>
                                                    </div>

                                                    @if($data->{$doc['field']})
                                                        <a class="document-link"
                                                            href="{{ route('data-personal.document', [$data->id, $doc['field']]) }}"
                                                            target="_blank" rel="noopener noreferrer">
                                                            Buka ↗
                                                        </a>
                                                    @endif

                                                </div>
                                            @endforeach

                                            @if($data->oppe)
                                                <div class="document-item">
                                                    <span class="document-icon purple">▧</span>

                                                    <div class="document-info">
                                                        <span class="document-name">OPPE Lama</span>
                                                        <span class="document-status available">
                                                            ● Dokumen tersedia
                                                        </span>
                                                    </div>

                                                    <a class="document-link"
                                                        href="{{ route('data-personal.document', [$data->id, 'oppe']) }}"
                                                        target="_blank" rel="noopener noreferrer">
                                                        Buka ↗
                                                    </a>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="modal-divider"></div>

                                        <div class="modal-section-title">
                                            <span class="section-icon" style="color:var(--orange);background:#fff0dd">
                                                ▧
                                            </span>
                                            Dokumen OPPE
                                        </div>

                                        <div class="document-list">

                                            @forelse($data->oppes as $oppe)
                                                <div class="document-item">

                                                    <span class="document-icon orange">▧</span>

                                                    <div class="document-info">
                                                        <span class="document-name">
                                                            {{ $oppe->nama_file ?? 'Dokumen OPPE' }}
                                                        </span>



                                                        <span class="document-status available">
                                                            ● {{ $oppe->nama_oppe ?? $oppe->nama_file ?? 'Dokumen OPPE' }}
                                                        </span>


                                                    </div>

                                                    <a class="document-link" href="{{ route('oppe.file', $oppe->id) }}"
                                                        target="_blank" rel="noopener noreferrer">
                                                        Buka ↗
                                                    </a>

                                                </div>
                                            @empty
                                                <div class="document-empty">
                                                    Belum ada dokumen OPPE tambahan.
                                                </div>
                                            @endforelse

                                        </div>

                                        <div class="modal-add-actions">
                                            <a href="{{ route('oppe.create', $data->id) }}" class="btn btn-light">
                                                ＋ Tambah OPPE
                                            </a>
                                        </div>

                                        <div class="modal-divider"></div>

                                        <div class="modal-section-title">
                                            <span class="section-icon" style="color:var(--green);background:#def7ed">
                                                ✧
                                            </span>
                                            Sertifikat
                                        </div>

                                        <div class="document-list">

                                            @forelse($data->sertifikats as $sertifikat)
                                                <div class="document-item">

                                                    <span class="document-icon green">✧</span>

                                                    <div class="document-info">
                                                        <span class="document-name">
                                                            {{ $sertifikat->nama_sertifikat ?? 'Sertifikat' }}
                                                        </span>

                                                        <span class="document-status available">
                                                            ● Dokumen sertifikat
                                                        </span>
                                                    </div>

                                                    <a class="document-link"
                                                        href="{{ route('sertifikat.file', $sertifikat->id) }}" target="_blank"
                                                        rel="noopener noreferrer">
                                                        Buka ↗
                                                    </a>

                                                </div>
                                            @empty
                                                <div class="document-empty">
                                                    Belum ada sertifikat yang ditambahkan.
                                                </div>
                                            @endforelse

                                        </div>

                                        <div class="modal-add-actions">
                                            <a href="{{ route('sertifikat.create', $data->id) }}" class="btn btn-light">
                                                ＋ Tambah Sertifikat
                                            </a>
                                        </div>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">⌕</div>
                                        <h3>Data Tidak Ditemukan</h3>
                                        <p>
                                            Belum ada data yang cocok dengan pencarian atau filter Anda.
                                        </p>

                                        <a href="{{ route('data-personal.index') }}" class="btn btn-primary">
                                            ↺ Tampilkan Semua Data
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="pagination-info">
                <span>
                    Menampilkan <strong id="shownData">{{ $dataPersonals->count() }}</strong>
                    data personal
                </span>

                <span>Komite Keperawatan · Data Personal</span>
            </div>

        </section>

    </main>

    <!-- MODAL DETAIL DOKUMEN -->

    <div class="modal-backdrop" id="documentModal" onclick="closeDocuments(event)">
        <section class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

            <header class="modal-header">
                <div>
                    <h2 id="modalTitle">Dokumen Personal</h2>
                    <p id="modalSubtitle">
                        Dokumen kepegawaian, OPPE, dan sertifikat.
                    </p>
                </div>

                <button type="button" class="modal-close" onclick="hideDocuments()" aria-label="Tutup">
                    ×
                </button>
            </header>

            <div class="modal-body" id="modalBody"></div>
        </section>
    </div>

    <script>
        function openDocuments(sourceId) {
            const source = document.getElementById(sourceId);
            const modal = document.getElementById('documentModal');
            const body = document.getElementById('modalBody');

            if (!source || !modal || !body) return;

            const personRow = source.previousElementSibling;
            const personName = personRow
                ? personRow.querySelector('.person-name')
                : null;

            const sourceContent = source.querySelector('.document-source');

            if (!sourceContent) return;

            body.innerHTML = sourceContent.innerHTML;

            document.getElementById('modalTitle').textContent =
                personName
                    ? 'Dokumen: ' + personName.textContent.trim()
                    : 'Dokumen Personal';

            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function hideDocuments() {
            document.getElementById('documentModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        function closeDocuments(event) {
            if (event.target.id === 'documentModal') {
                hideDocuments();
            }
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                hideDocuments();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('filterForm');
            const searchInput = document.getElementById('search');
            const topSearch = document.getElementById('topSearch');
            const unitSelect = document.getElementById('unit_kerja');

            let timer = null;
            let controller = null;

            async function searchData() {
                clearTimeout(timer);

                timer = setTimeout(async function () {
                    if (controller) controller.abort();
                    controller = new AbortController();

                    const params = new URLSearchParams(new FormData(form));
                    const url = form.action + '?' + params.toString();

                    try {
                        const response = await fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            signal: controller.signal
                        });

                        if (!response.ok) {
                            throw new Error('Pencarian gagal');
                        }

                        const html = await response.text();
                        const parsed = new DOMParser().parseFromString(
                            html,
                            'text/html'
                        );

                        const newBody = parsed.querySelector('#staffTableBody');
                        const newTotal = parsed.querySelector('#totalData');
                        const newShown = parsed.querySelector('#shownData');

                        if (newBody) {
                            document.getElementById('staffTableBody').innerHTML =
                                newBody.innerHTML;
                        }

                        if (newTotal) {
                            document.getElementById('totalData').textContent =
                                newTotal.textContent;
                        }

                        if (newShown) {
                            document.getElementById('shownData').textContent =
                                newShown.textContent;
                        }

                        window.history.replaceState({}, '', url);

                    } catch (error) {
                        if (error.name !== 'AbortError') {
                            console.error(error);
                        }
                    }
                }, 300);
            }

            searchInput.addEventListener('input', function () {
                topSearch.value = searchInput.value;
                searchData();
            });

            topSearch.addEventListener('input', function () {
                searchInput.value = topSearch.value;
                searchData();
            });

            unitSelect.addEventListener('change', searchData);

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                searchData();
            });
        });
    </script>

</body>

</html>