<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komite Keperawatan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 30px;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .container {
            padding: 30px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #1e3a8a;
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            margin-bottom: 8px;
        }

        .description {
            color: #64748b;
            margin-bottom: 25px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            text-decoration: none;
            color: #1e293b;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .menu-card h3 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .menu-card p {
            color: #64748b;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>

    <div class="container">

        <a href="/dashboard" class="back">← Kembali ke Dashboard</a>

        <h1>Komite Keperawatan</h1>

        <p class="description">
            Pilih bagian Komite Keperawatan yang ingin dibuka.
        </p>

        <div class="menu-grid">

            <a href="{{ route('komite.mutu') }}" class="menu-card">
                <h3>Sub Komite Mutu</h3>
                <p>Informasi dan pengelolaan Sub Komite Mutu.</p>
            </a>

            <a href="{{ route('komite.kredensial') }}" class="menu-card">
                <h3>Kredensial</h3>
                <p>Informasi dan pengelolaan kredensial keperawatan.</p>
            </a>

            <a href="{{ route('komite.etik') }}" class="menu-card">
                <h3>Etik</h3>
                <p>Informasi dan pengelolaan etik keperawatan.</p>
            </a>

        </div>

    </div>

</body>

</html>