<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Personal - Komite Keperawatan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
            overflow-x: hidden;
        }

        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {
            height: 58px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 0 32px;
        }

        .navbar h2 {
            font-size: 19px;
            font-weight: 700;
        }

        /* =========================================================
           CONTAINER
        ========================================================= */

        .container {
            width: 100%;
            max-width: 1180px;
            margin: 18px auto;
            padding: 0 18px;
        }

        /* =========================================================
           CARD
        ========================================================= */

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card h1 {
            color: #1e3a8a;
            font-size: 22px;
            margin-bottom: 4px;
        }

        .card>p {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 12px;
        }

        /* =========================================================
           SECTION
        ========================================================= */

        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a8a;

            margin: 10px 0 8px;
            padding-bottom: 5px;

            border-bottom: 1px solid #dbeafe;
        }

        /* =========================================================
           FORM GRID
        ========================================================= */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 14px;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 9px 12px;
        }

        .form-group {
            min-width: 0;
        }

        .full {
            grid-column: 1 / -1;
        }

        /* =========================================================
           LABEL
        ========================================================= */

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 4px;
            font-size: 12px;
            color: #374151;
        }

        /* =========================================================
           INPUT & SELECT
        ========================================================= */

        input,
        select {
            width: 100%;
            height: 36px;

            padding: 7px 10px;

            border: 1px solid #d1d5db;
            border-radius: 7px;

            font-size: 12px;
            background: white;
            color: #1f2937;
        }

        input[type="file"] {
            height: 36px;
            padding: 7px 8px;
            cursor: pointer;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.08);
        }

        /* =========================================================
           INPUT WRAPPER
        ========================================================= */

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input,
        .input-wrapper select {
            padding-right: 36px;
        }

        /* =========================================================
           TOMBOL X INPUT
        ========================================================= */

        .clear-input {
            position: absolute;

            right: 7px;
            top: 50%;

            transform: translateY(-50%);

            width: 22px;
            height: 22px;

            border: none;
            border-radius: 50%;

            background: #e5e7eb;
            color: #4b5563;

            font-size: 16px;
            font-weight: bold;

            line-height: 22px;
            text-align: center;

            cursor: pointer;

            display: none;
            padding: 0;
        }

        .clear-input:hover {
            background: #d1d5db;
            color: #111827;
        }

        /* =========================================================
           FILE
        ========================================================= */

        .file-wrapper {
            position: relative;
        }

        .file-wrapper input[type="file"] {
            padding-right: 38px;
        }

        .clear-file {
            position: absolute;

            right: 7px;
            top: 50%;

            transform: translateY(-50%);

            width: 22px;
            height: 22px;

            border: none;
            border-radius: 50%;

            background: #e5e7eb;
            color: #4b5563;

            font-size: 16px;
            font-weight: bold;

            line-height: 22px;
            text-align: center;

            cursor: pointer;

            display: none;
            padding: 0;
        }

        .clear-file:hover {
            background: #d1d5db;
            color: #111827;
        }

        .file-info {
            display: block;

            margin-top: 3px;

            color: #6b7280;

            font-size: 10px;
            line-height: 12px;
        }

        /* =========================================================
           ERROR
        ========================================================= */

        .error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 3px;
        }

        /* =========================================================
           BUTTON
        ========================================================= */

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 8px;

            margin-top: 14px;
            padding-top: 10px;

            border-top: 1px solid #eef2f7;
        }

        .button {
            min-width: 105px;

            padding: 9px 15px;

            border-radius: 7px;
            text-decoration: none;

            border: none;
            cursor: pointer;

            font-size: 12px;
            font-weight: bold;

            text-align: center;
        }

        .save {
            background: #2563eb;
            color: white;
        }

        .save:hover {
            background: #1d4ed8;
        }

        .save:disabled {
            background: #6b93d6;
            cursor: not-allowed;
            opacity: 0.9;
        }

        .cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .cancel:hover {
            background: #d1d5db;
        }

        /* =========================================================
           POP UP LOADING
        ========================================================= */

        .loading-overlay {
            display: none;
            position: fixed;
            inset: 0;

            width: 100%;
            height: 100%;

            background: rgba(15, 23, 42, 0.45);

            z-index: 99999;

            align-items: center;
            justify-content: center;
        }

        .loading-box {
            width: 190px;

            padding: 24px 20px;

            background: white;

            border-radius: 14px;

            text-align: center;

            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.22);
        }

        .loading-spinner-large {
            width: 40px;
            height: 40px;

            margin: 0 auto 13px;

            border: 4px solid #dbe7f8;
            border-top-color: #2563eb;

            border-radius: 50%;

            animation: spinLoading 0.8s linear infinite;
        }

        .loading-text {
            font-size: 14px;
            font-weight: 700;
            color: #174a87;
        }

        .loading-subtext {
            margin-top: 5px;

            font-size: 11px;
            color: #6b7280;
        }

        @keyframes spinLoading {
            to {
                transform: rotate(360deg);
            }
        }

        /* =========================================================
           DESKTOP TINGGI PENDEK
        ========================================================= */

        @media (max-height: 800px) and (min-width: 900px) {

            .navbar {
                height: 52px;
            }

            .container {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .card {
                padding: 15px 20px;
            }

            .card h1 {
                font-size: 20px;
            }

            .card>p {
                margin-bottom: 8px;
            }

            .section-title {
                margin: 7px 0 6px;
            }

            .form-grid {
                gap: 7px 12px;
            }

            .document-grid {
                gap: 7px 10px;
            }

            input,
            select,
            input[type="file"] {
                height: 33px;
                padding: 5px 8px;
            }

            .buttons {
                margin-top: 10px;
                padding-top: 7px;
            }
        }

        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 1000px) {

            .document-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 650px) {

            body {
                overflow-y: auto;
            }

            .navbar {
                height: 52px;
                padding: 0 18px;
            }

            .navbar h2 {
                font-size: 17px;
            }

            .container {
                margin: 12px auto;
                padding: 0 10px;
            }

            .card {
                padding: 16px;
                border-radius: 10px;
            }

            .card h1 {
                font-size: 19px;
            }

            .form-grid,
            .document-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .buttons {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }

            .loading-box {
                width: 175px;
            }
        }
    </style>
</head>

<body>

    {{-- =========================================================
    NAVBAR
    ========================================================== --}}

    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>


    {{-- =========================================================
    CONTAINER
    ========================================================== --}}

    <div class="container">

        <div class="card">

            <h1>Tambah Data Personal</h1>

            <p>
                Masukkan data personal tenaga keperawatan.
            </p>


            <form id="dataPersonalForm" action="{{ route('data-personal.store') }}" method="POST"
                enctype="multipart/form-data">

                @csrf


                {{-- =================================================
                INFORMASI PERSONAL
                ================================================== --}}

                <div class="section-title">
                    Informasi Personal
                </div>

                <div class="form-grid">


                    {{-- NAMA --}}
                    <div class="form-group full">

                        <label for="nama">
                            Nama Lengkap
                        </label>

                        <div class="input-wrapper">

                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                placeholder="Masukkan nama lengkap" autocomplete="off">

                            <button type="button" class="clear-input" id="clear-nama" onclick="clearTextInput('nama')"
                                title="Hapus">
                                ×
                            </button>

                        </div>

                        @error('nama')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NIP --}}
                    <div class="form-group">

                        <label for="nip">
                            NIP
                        </label>

                        <div class="input-wrapper">

                            <input type="text" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP"
                                autocomplete="off">

                            <button type="button" class="clear-input" id="clear-nip" onclick="clearTextInput('nip')"
                                title="Hapus">
                                ×
                            </button>

                        </div>

                        @error('nip')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- UNIT KERJA --}}
                    <div class="form-group">

                        <label for="unit_kerja">
                            Unit Kerja
                        </label>

                        <div class="input-wrapper">

                            <select id="unit_kerja" name="unit_kerja">

                                <option value="">
                                    -- Pilih Unit Kerja --
                                </option>

                                <option value="K IRI" {{ old('unit_kerja') == 'K IRI' ? 'selected' : '' }}>
                                    K IRI
                                </option>

                                <option value="MPP" {{ old('unit_kerja') == 'MPP' ? 'selected' : '' }}>
                                    MPP
                                </option>

                                <option value="MUTU" {{ old('unit_kerja') == 'MUTU' ? 'selected' : '' }}>
                                    MUTU
                                </option>

                                <option value="PPI" {{ old('unit_kerja') == 'PPI' ? 'selected' : '' }}>
                                    PPI
                                </option>

                                <option value="Catleya" {{ old('unit_kerja') == 'Catleya' ? 'selected' : '' }}>
                                    Catleya
                                </option>

                                <option value="Alamanda" {{ old('unit_kerja') == 'Alamanda' ? 'selected' : '' }}>
                                    Alamanda
                                </option>

                                <option value="Gardenia" {{ old('unit_kerja') == 'Gardenia' ? 'selected' : '' }}>
                                    Gardenia
                                </option>

                                <option value="Tulip HCU/Kamelia NIKU" {{ old('unit_kerja') == 'Tulip HCU/Kamelia NIKU' ? 'selected' : '' }}>
                                    Tulip HCU/Kamelia NIKU
                                </option>

                                <option value="HD" {{ old('unit_kerja') == 'HD' ? 'selected' : '' }}>
                                    HD
                                </option>

                                <option value="IRJ" {{ old('unit_kerja') == 'IRJ' ? 'selected' : '' }}>
                                    IRJ
                                </option>

                                <option value="IBS" {{ old('unit_kerja') == 'IBS' ? 'selected' : '' }}>
                                    IBS
                                </option>

                                <option value="ICU" {{ old('unit_kerja') == 'ICU' ? 'selected' : '' }}>
                                    ICU
                                </option>

                                <option value="IGD" {{ old('unit_kerja') == 'IGD' ? 'selected' : '' }}>
                                    IGD
                                </option>

                                <option value="Mawar" {{ old('unit_kerja') == 'Mawar' ? 'selected' : '' }}>
                                    Mawar
                                </option>

                                <option value="Amarylis" {{ old('unit_kerja') == 'Amarylis' ? 'selected' : '' }}>
                                    Amarylis
                                </option>

                            </select>

                            <button type="button" class="clear-input" id="clear-unit_kerja"
                                onclick="clearSelectInput('unit_kerja')" title="Hapus pilihan">
                                ×
                            </button>

                        </div>

                        @error('unit_kerja')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JABATAN --}}
                    <div class="form-group">

                        <label for="jabatan">
                            Jabatan
                        </label>

                        <div class="input-wrapper">

                            <select id="jabatan" name="jabatan">

                                <option value="">
                                    -- Pilih Jabatan --
                                </option>

                                <option value="Kepala Ruangan" {{ old('jabatan') == 'Kepala Ruangan' ? 'selected' : '' }}>
                                    Kepala Ruangan
                                </option>

                                <option value="Katim" {{ old('jabatan') == 'Katim' ? 'selected' : '' }}>
                                    Katim
                                </option>

                                <option value="Pelaksana" {{ old('jabatan') == 'Pelaksana' ? 'selected' : '' }}>
                                    Pelaksana
                                </option>

                            </select>

                            <button type="button" class="clear-input" id="clear-jabatan"
                                onclick="clearSelectInput('jabatan')" title="Hapus pilihan">
                                ×
                            </button>

                        </div>

                        @error('jabatan')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- =================================================
                KELENGKAPAN DOKUMEN
                ================================================== --}}

                <div class="section-title">
                    Kelengkapan Dokumen
                </div>

                <div class="document-grid">


                    {{-- IJAZAH --}}
                    <div class="form-group">

                        <label for="ijazah">
                            Ijazah (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="ijazah" name="ijazah" accept=".pdf,application/pdf"
                                onchange="updateFileButton('ijazah')">

                            <button type="button" class="clear-file" id="clear-ijazah"
                                onclick="clearFileInput('ijazah')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('ijazah')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- STR --}}
                    <div class="form-group">

                        <label for="str">
                            STR (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="str" name="str" accept=".pdf,application/pdf"
                                onchange="updateFileButton('str')">

                            <button type="button" class="clear-file" id="clear-str" onclick="clearFileInput('str')"
                                title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('str')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- SIPP / SIPB --}}
                    <div class="form-group">

                        <label for="sipp_sipb">
                            SIPP / SIPB (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="sipp_sipb" name="sipp_sipb" accept=".pdf,application/pdf"
                                onchange="updateFileButton('sipp_sipb')">

                            <button type="button" class="clear-file" id="clear-sipp_sipb"
                                onclick="clearFileInput('sipp_sipb')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('sipp_sipb')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- SPK / RKK --}}
                    <div class="form-group">

                        <label for="spk_rkk">
                            SPK / RKK (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="spk_rkk" name="spk_rkk" accept=".pdf,application/pdf"
                                onchange="updateFileButton('spk_rkk')">

                            <button type="button" class="clear-file" id="clear-spk_rkk"
                                onclick="clearFileInput('spk_rkk')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('spk_rkk')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- PROSES KREDENSIAL --}}
                    <div class="form-group">

                        <label for="proses_kredensial">
                            Proses Kredensial (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="proses_kredensial" name="proses_kredensial"
                                accept=".pdf,application/pdf" onchange="updateFileButton('proses_kredensial')">

                            <button type="button" class="clear-file" id="clear-proses_kredensial"
                                onclick="clearFileInput('proses_kredensial')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('proses_kredensial')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- SK PENEMPATAN KERJA --}}
                    <div class="form-group">

                        <label for="sk_penempatan_kerja">
                            SK Penempatan Kerja (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="sk_penempatan_kerja" name="sk_penempatan_kerja"
                                accept=".pdf,application/pdf" onchange="updateFileButton('sk_penempatan_kerja')">

                            <button type="button" class="clear-file" id="clear-sk_penempatan_kerja"
                                onclick="clearFileInput('sk_penempatan_kerja')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('sk_penempatan_kerja')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- URAIAN TUGAS --}}
                    <div class="form-group">

                        <label for="uraian_tugas">
                            Uraian Tugas (PDF)
                        </label>

                        <div class="file-wrapper">

                            <input type="file" id="uraian_tugas" name="uraian_tugas" accept=".pdf,application/pdf"
                                onchange="updateFileButton('uraian_tugas')">

                            <button type="button" class="clear-file" id="clear-uraian_tugas"
                                onclick="clearFileInput('uraian_tugas')" title="Batalkan file">
                                ×
                            </button>

                        </div>

                        <span class="file-info">
                            PDF, maksimal 10 MB.
                        </span>

                        @error('uraian_tugas')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    
                </div>




                {{-- =================================================
                BUTTON
                ================================================== --}}

                <div class="buttons">

                    <a href="{{ route('data-personal.index') }}" class="button cancel" id="cancelButton">
                        Batal
                    </a>

                    <button type="submit" class="button save" id="saveButton">
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
    POP UP LOADING
    ========================================================== --}}

    <div class="loading-overlay" id="loadingOverlay">

        <div class="loading-box">

            <div class="loading-spinner-large"></div>

            <div class="loading-text">
                Menyimpan...
            </div>

            <div class="loading-subtext">
                Mohon tunggu sebentar
            </div>

        </div>

    </div>


    {{-- =========================================================
    JAVASCRIPT
    ========================================================== --}}

    <script>

        /*
        |--------------------------------------------------------------------------
        | INPUT TEXT
        |--------------------------------------------------------------------------
        */

        function updateTextButton(id) {

            const input = document.getElementById(id);
            const button = document.getElementById('clear-' + id);

            if (!input || !button) {
                return;
            }

            if (input.value.trim() !== '') {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        }


        function clearTextInput(id) {

            const input = document.getElementById(id);

            if (!input) {
                return;
            }

            input.value = '';

            updateTextButton(id);

            input.focus();
        }


        /*
        |--------------------------------------------------------------------------
        | SELECT
        |--------------------------------------------------------------------------
        */

        function updateSelectButton(id) {

            const select = document.getElementById(id);
            const button = document.getElementById('clear-' + id);

            if (!select || !button) {
                return;
            }

            if (select.value !== '') {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        }


        function clearSelectInput(id) {

            const select = document.getElementById(id);

            if (!select) {
                return;
            }

            select.value = '';

            updateSelectButton(id);

            select.focus();
        }


        /*
        |--------------------------------------------------------------------------
        | FILE
        |--------------------------------------------------------------------------
        */

        function updateFileButton(id) {

            const input = document.getElementById(id);
            const button = document.getElementById('clear-' + id);

            if (!input || !button) {
                return;
            }

            if (input.files.length > 0) {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        }


        function clearFileInput(id) {

            const input = document.getElementById(id);

            if (!input) {
                return;
            }

            input.value = '';

            updateFileButton(id);
        }


        /*
        |--------------------------------------------------------------------------
        | SAAT HALAMAN DIBUKA
        |--------------------------------------------------------------------------
        */

        document.addEventListener('DOMContentLoaded', function () {

            updateTextButton('nama');
            updateTextButton('nip');

            updateSelectButton('unit_kerja');
            updateSelectButton('jabatan');

            updateFileButton('ijazah');
            updateFileButton('str');
            updateFileButton('sipp_sipb');
            updateFileButton('spk_rkk');
            updateFileButton('proses_kredensial');
            updateFileButton('sk_penempatan_kerja');
            updateFileButton('uraian_tugas');
            updateFileButton('oppe');


            /*
            |--------------------------------------------------------------------------
            | UPDATE TOMBOL X SAAT MENGETIK
            |--------------------------------------------------------------------------
            */

            document.getElementById('nama').addEventListener(
                'input',
                function () {
                    updateTextButton('nama');
                }
            );

            document.getElementById('nip').addEventListener(
                'input',
                function () {
                    updateTextButton('nip');
                }
            );


            /*
            |--------------------------------------------------------------------------
            | UPDATE TOMBOL X SAAT MEMILIH DROPDOWN
            |--------------------------------------------------------------------------
            */

            document.getElementById('unit_kerja').addEventListener(
                'change',
                function () {
                    updateSelectButton('unit_kerja');
                }
            );

            document.getElementById('jabatan').addEventListener(
                'change',
                function () {
                    updateSelectButton('jabatan');
                }
            );


            /*
            |--------------------------------------------------------------------------
            | LOADING SAAT SIMPAN DATA
            |--------------------------------------------------------------------------
            */

            const form = document.getElementById('dataPersonalForm');
            const saveButton = document.getElementById('saveButton');
            const cancelButton = document.getElementById('cancelButton');
            const loadingOverlay = document.getElementById('loadingOverlay');

            if (form && saveButton && loadingOverlay) {

                form.addEventListener('submit', function () {

                    /*
                    | Tampilkan pop up
                    */

                    loadingOverlay.style.display = 'flex';


                    /*
                    | Nonaktifkan tombol Simpan
                    */

                    saveButton.disabled = true;


                    /*
                    | Ubah tulisan tombol
                    */

                    saveButton.innerHTML = 'Menyimpan...';


                    /*
                    | Nonaktifkan tombol Batal
                    */

                    if (cancelButton) {

                        cancelButton.style.pointerEvents = 'none';
                        cancelButton.style.opacity = '0.5';

                    }

                });

            }

        });

    </script>

</body>

</html>