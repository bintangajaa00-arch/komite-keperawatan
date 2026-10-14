<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Komite Keperawatan</title>

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

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #173b8f, #2563b8);
            color: white;
            padding: 17px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .brand small {
            display: block;
            margin-top: 3px;
            font-size: 11px;
            opacity: 0.8;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 14px;
        }

        .user-icon {
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout {
            background: #dc2626;
            color: white;
            border: none;
            padding: 9px 16px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        .logout:hover {
            background: #b91c1c;
        }

        /* CONTAINER */
        .container {
            max-width: 1250px;
            margin: auto;
            padding: 30px 35px 45px;
        }

        /* WELCOME */
        .welcome {
            background: white;
            border-radius: 14px;
            padding: 25px 28px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.06);
            border-left: 5px solid #2563eb;
        }

        .welcome h1 {
            font-size: 26px;
            margin-bottom: 7px;
            color: #172554;
        }

        .welcome p {
            color: #64748b;
            font-size: 14px;
        }

        .welcome-user {
            margin-top: 14px;
            display: inline-block;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 7px 13px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        /* SECTION TITLE */
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .section-title h2 {
            font-size: 18px;
            color: #172554;
        }

        .section-title span {
            color: #64748b;
            font-size: 12px;
        }

        /* MENU */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .menu-card {
            position: relative;
            background: white;
            padding: 23px;
            min-height: 175px;
            border-radius: 13px;
            text-decoration: none;
            color: #1e293b;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.07);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .menu-card::after {
            content: "";
            position: absolute;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            right: -30px;
            bottom: -35px;
            background: rgba(37, 99, 235, 0.06);
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
            border-color: #bfdbfe;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 17px;
        }

        .blue {
            background: #dbeafe;
        }

        .green {
            background: #dcfce7;
        }

        .orange {
            background: #ffedd5;
        }

        .purple {
            background: #f3e8ff;
        }

        .menu-card h3 {
            font-size: 16px;
            margin-bottom: 8px;
            color: #172554;
        }

        .menu-card p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        .arrow {
            position: absolute;
            right: 20px;
            top: 23px;
            color: #94a3b8;
            font-size: 18px;
            z-index: 2;
        }

        /* INFORMATION */
        .info-section {
            margin-top: 25px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 18px;
        }

        .info-card {
            background: white;
            border-radius: 13px;
            padding: 22px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
            border: 1px solid #e2e8f0;
        }

        .info-card h3 {
            font-size: 16px;
            color: #172554;
            margin-bottom: 10px;
        }

        .info-card p {
            font-size: 13px;
            line-height: 1.6;
            color: #64748b;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 13px;
            padding: 7px 12px;
            border-radius: 6px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: #10b981;
            border-radius: 50%;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 28px;
            color: #94a3b8;
            font-size: 11px;
        }

        @media (max-width: 1000px) {
            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 14px 18px;
            }

            .container {
                padding: 20px 18px 35px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .user-profile span {
                display: none;
            }

            .brand h2 {
                font-size: 16px;
            }

            .brand small {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="brand">
            <div class="brand-icon">🏥</div>

            <div>
                <h2>Komite Keperawatan</h2>
                <small>Sistem Informasi Keperawatan</small>
            </div>
        </div>

        <div class="user-info">

            <div class="user-profile">
                <div class="user-icon">👤</div>
                <span>{{ Auth::user()->name }}</span>
            </div>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout">
                    Logout
                </button>
            </form>

        </div>

    </div>


    <!-- CONTENT -->
    <div class="container">

        <!-- WELCOME -->
        <div class="welcome">

            <h1>Dashboard</h1>

            <p>
                Selamat datang di Sistem Informasi Komite Keperawatan.
                Silakan pilih menu yang ingin Anda akses.
            </p>

            <div class="welcome-user">
                👤 {{ Auth::user()->name }} &nbsp; • &nbsp; Administrator
            </div>

        </div>


        <!-- MENU -->
        <div class="section-title">
            <h2>Menu Utama</h2>
            <span>Sistem Informasi Komite Keperawatan</span>
        </div>

        <div class="menu-grid">

            <!-- KOMITE -->
            <a href="{{ route('komite.index') }}" class="menu-card">

                <div class="card-icon blue">
                    👥
                </div>

                <span class="arrow">→</span>

                <h3>Komite</h3>

                <p>
                    Sub Komite Mutu, Kredensial, dan Etik.
                </p>

            </a>


            <!-- PANDUAN -->
            <a href="{{ route('panduan.index') }}" class="menu-card">

                <div class="card-icon green">
                    📚
                </div>

                <span class="arrow">→</span>

                <h3>Panduan / Pedoman</h3>

                <p>
                    Kelola dokumen panduan dan pedoman keperawatan.
                </p>

            </a>


            <!-- SPO -->
            <a href="{{ route('spo.index') }}" class="menu-card">

                <div class="card-icon orange">
                    📋
                </div>

                <span class="arrow">→</span>

                <h3>SPO Keperawatan</h3>

                <p>
                    Kelola dokumen Standar Prosedur Operasional Keperawatan.
                </p>

            </a>


            <!-- DATA PERSONAL -->
            <a href="{{ route('data-personal.index') }}" class="menu-card">

                <div class="card-icon purple">
                    🧑‍⚕️
                </div>

                <span class="arrow">→</span>

                <h3>Data Personal</h3>

                <p>
                    Kelola data personal dan dokumen tenaga keperawatan.
                </p>

            </a>

        </div>


        <!-- INFORMATION -->
        <div class="info-section">

            <div class="info-card">

                <h3>📌 Informasi Sistem</h3>

                <p>
                    Sistem Informasi Komite Keperawatan digunakan untuk
                    membantu pengelolaan data komite, dokumen panduan,
                    SPO Keperawatan, serta data personal tenaga keperawatan
                    secara terstruktur.
                </p>

                <div class="status">
                    <span class="status-dot"></span>
                    Sistem aktif
                </div>

            </div>


            <div class="info-card">

                <h3>🔐 Hak Akses</h3>

                <p>
                    Anda masuk sebagai <strong>Administrator</strong>.
                    Administrator dapat mengelola seluruh data pada sistem.
                </p>

            </div>

        </div>


        <div class="footer">
            Sistem Informasi Komite Keperawatan © {{ date('Y') }}
        </div>

    </div>

</body>

</html>