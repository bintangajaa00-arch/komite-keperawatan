<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Personal - Komite Keperawatan</title>

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

        /* LOADING OVERLAY */
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.88);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-box {
            background: white;
            padding: 24px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
            text-align: center;
            min-width: 230px;
        }

        .loading-spinner {
            width: 38px;
            height: 38px;
            margin: 0 auto 12px;
            border: 4px solid #dbeafe;
            border-top-color: #2563eb;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        .loading-text {
            color: #1e3a8a;
            font-size: 13px;
            font-weight: bold;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* NAVBAR */
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

        /* CONTAINER */
        .container {
            width: 100%;
            max-width: 1180px;
            margin: 18px auto;
            padding: 0 18px;
        }

        /* CARD */
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

        /* SECTION */
        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a8a;
            margin: 10px 0 8px;
            padding-bottom: 5px;
            border-bottom: 1px solid #dbeafe;
        }

        /* GRID */
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

        /* LABEL */
        label {
            display: block;
            font-weight: 700;
            margin-bottom: 4px;
            font-size: 12px;
            color: #374151;
        }

        /* INPUT & SELECT */
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

        /* INPUT WRAPPER */
        .input-wrapper,
        .file-wrapper {
            position: relative;
        }

        .input-wrapper input,
        .input-wrapper select {
            padding-right: 36px;
        }

        /* TOMBOL X */
        .clear-button {
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
            z-index: 2;
        }

        .clear-button:hover {
            background: #d1d5db;
            color: #111827;
        }

        /* FILE */
        .file-wrapper input[type="file"] {
            padding-right: 38px;
        }

        .current-file {
            display: block;
            margin-top: 3px;
            color: #2563eb;
            font-size: 10px;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .current-file:hover {
            text-decoration: underline;
        }

        .file-info {
            display: block;
            margin-top: 2px;
            color: #6b7280;
            font-size: 10px;
            line-height: 12px;
        }

        /* ERROR */
        .error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 3px;
        }

        /* BUTTON */
        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 14px;
            padding-top: 10px;
            border-top: 1px solid #eef2f7;
        }

        .button {
            min-width: 125px;
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

        .cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .cancel:hover {
            background: #d1d5db;
        }

        /* LAYAR PENDEK */
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

        /* TABLET */
        @media (max-width: 1000px) {
            .document-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* MOBILE */
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
        }
    </style>
</head>

<body>

    {{-- LOADING OVERLAY --}}
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-box">
            <div class="loading-spinner"></div>
            <div class="loading-text">
                Menyimpan perubahan...
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>

    {{-- CONTAINER --}}
    <div class="container">
        <div class="card">

            <h1>Edit Data Personal</h1>

            <p>
                Perbarui data personal tenaga keperawatan.
            </p>

            <form action="{{ route('data-personal.update', $dataPersonal->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- INFORMASI PERSONAL --}}
                <div class="section-title">
                    Informasi Personal
                </div>

                <div class="form-grid">

                    {{-- NAMA --}}
                    <div class="form-group full">
                        <label for="nama">Nama Lengkap</label>

                        <div class="input-wrapper">
                            <input type="text" id="nama" name="nama" value="{{ old('nama', $dataPersonal->nama) }}"
                                placeholder="Masukkan nama lengkap" autocomplete="off">

                            <button type="button" class="clear-button" id="clear-nama" onclick="clearTextInput('nama')"
                                title="Hapus">
                                ×
                            </button>
                        </div>

                        @error('nama')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NIP --}}
                    <div class="form-group">
                        <label for="nip">NIP</label>

                        <div class="input-wrapper">
                            <input type="text" id="nip" name="nip" value="{{ old('nip', $dataPersonal->nip) }}"
                                placeholder="Masukkan NIP" autocomplete="off">

                            <button type="button" class="clear-button" id="clear-nip" onclick="clearTextInput('nip')"
                                title="Hapus">
                                ×
                            </button>
                        </div>

                        @error('nip')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- UNIT KERJA --}}
                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja</label>

                        <div class="input-wrapper">
                            @php
                                $unitKerja = old(
                                    'unit_kerja',
                                    $dataPersonal->unit_kerja
                                );
                            @endphp

                            <select id="unit_kerja" name="unit_kerja">
                                <option value="">-- Pilih Unit Kerja --</option>

                                @foreach ([
                                        'K IRI',
                                        'MPP',
                                        'MUTU',
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
                                        'Amarylis'
                                    ] as $unit)
                                    <option value="{{ $unit }}" {{ $unitKerja == $unit ? 'selected' : '' }}>
                                        {{ $unit }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="button" class="clear-button" id="clear-unit_kerja"
                                onclick="clearSelectInput('unit_kerja')" title="Hapus pilihan">
                                ×
                            </button>
                        </div>

                        @error('unit_kerja')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- JABATAN --}}
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>

                        <div class="input-wrapper">
                            @php
                                $jabatan = old(
                                    'jabatan',
                                    $dataPersonal->jabatan
                                );
                            @endphp

                            <select id="jabatan" name="jabatan">
                                <option value="">-- Pilih Jabatan --</option>

                                @foreach ([
                                        'Kepala Ruangan',
                                        'Katim',
                                        'Pelaksana'
                                    ] as $posisi)
                                    <option value="{{ $posisi }}" {{ $jabatan == $posisi ? 'selected' : '' }}>
                                        {{ $posisi }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="button" class="clear-button" id="clear-jabatan"
                                onclick="clearSelectInput('jabatan')" title="Hapus pilihan">
                                ×
                            </button>
                        </div>

                        @error('jabatan')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- KELENGKAPAN DOKUMEN --}}
                <div class="section-title">
                    Kelengkapan Dokumen
                </div>

                <div class="document-grid">

                    @php
                        $documents = [
                            'ijazah' => [
                                'label' => 'Ijazah',
                                'current' => $dataPersonal->ijazah,
                                'link' => 'Lihat Ijazah'
                            ],

                            'str' => [
                                'label' => 'STR',
                                'current' => $dataPersonal->str,
                                'link' => 'Lihat STR'
                            ],

                            'sipp_sipb' => [
                                'label' => 'SIPP / SIPB',
                                'current' => $dataPersonal->sipp_sipb,
                                'link' => 'Lihat SIPP / SIPB'
                            ],

                            'spk_rkk' => [
                                'label' => 'SPK / RKK',
                                'current' => $dataPersonal->spk_rkk,
                                'link' => 'Lihat SPK / RKK'
                            ],

                            'proses_kredensial' => [
                                'label' => 'Proses Kredensial',
                                'current' => $dataPersonal->proses_kredensial,
                                'link' => 'Lihat Proses Kredensial'
                            ],

                            'sk_penempatan_kerja' => [
                                'label' => 'SK Penempatan Kerja',
                                'current' => $dataPersonal->sk_penempatan_kerja,
                                'link' => 'Lihat SK Penempatan Kerja'
                            ],

                            'uraian_tugas' => [
                                'label' => 'Uraian Tugas',
                                'current' => $dataPersonal->uraian_tugas,
                                'link' => 'Lihat Uraian Tugas'
                            ],

                            'oppe' => [
                                'label' => 'OPPE',
                                'current' => $dataPersonal->oppe,
                                'link' => 'Lihat OPPE'
                            ]
                        ];
                    @endphp

                    @foreach ($documents as $field => $document)
                        <div class="form-group">

                            <label for="{{ $field }}">
                                {{ $document['label'] }} (PDF)
                            </label>

                            <div class="file-wrapper">
                                <input type="file" id="{{ $field }}" name="{{ $field }}" accept=".pdf,application/pdf"
                                    onchange="updateFileButton('{{ $field }}')">

                                <button type="button" class="clear-button" id="clear-{{ $field }}"
                                    onclick="clearFileInput('{{ $field }}')" title="Batalkan file baru">
                                    ×
                                </button>
                            </div>

                            @if ($document['current'])
                                <a href="{{ asset('storage/' . $document['current']) }}" target="_blank"
                                    rel="noopener noreferrer" class="current-file" title="{{ $document['link'] }}">
                                    {{ $document['link'] }}
                                </a>
                            @endif

                            <span class="file-info">
                                Kosongkan jika tidak ingin mengganti.
                            </span>

                            @error($field)
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>
                    @endforeach

                </div>

                {{-- BUTTON --}}
                <div class="buttons">
                    <a href="{{ route('data-personal.index') }}" class="button cancel">
                        Batal
                    </a>

                    <button type="submit" class="button save">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>

    {{-- JAVASCRIPT --}}
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
        | INITIAL
        |--------------------------------------------------------------------------
        */

        document.addEventListener('DOMContentLoaded', function () {
            updateTextButton('nama');
            updateTextButton('nip');

            updateSelectButton('unit_kerja');
            updateSelectButton('jabatan');

            document.getElementById('nama')
                .addEventListener('input', function () {
                    updateTextButton('nama');
                });

            document.getElementById('nip')
                .addEventListener('input', function () {
                    updateTextButton('nip');
                });

            document.getElementById('unit_kerja')
                .addEventListener('change', function () {
                    updateSelectButton('unit_kerja');
                });

            document.getElementById('jabatan')
                .addEventListener('change', function () {
                    updateSelectButton('jabatan');
                });

            [
                'ijazah',
                'str',
                'sipp_sipb',
                'spk_rkk',
                'proses_kredensial',
                'sk_penempatan_kerja',
                'uraian_tugas',
                'oppe'
            ].forEach(function (id) {
                updateFileButton(id);
            });

            /*
            |--------------------------------------------------------------------------
            | LOADING SAAT SIMPAN PERUBAHAN
            |--------------------------------------------------------------------------
            */

            const form = document.querySelector('form');
            const loadingOverlay = document.getElementById('loadingOverlay');
            const saveButton = document.querySelector('.save');

            if (form && loadingOverlay && saveButton) {
                form.addEventListener('submit', function () {
                    loadingOverlay.style.display = 'flex';

                    saveButton.disabled = true;
                    saveButton.style.opacity = '0.7';
                    saveButton.style.cursor = 'not-allowed';
                });
            }
        });
    </script>

</body>

</html>