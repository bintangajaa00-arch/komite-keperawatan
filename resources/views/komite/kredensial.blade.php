<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredensial - Komite Keperawatan</title>

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
            margin-bottom: 10px;
        }

        .content {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .content p {
            color: #64748b;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Komite Keperawatan</h2>
    </div>

    <div class="container">

        <a href="{{ route('komite.index') }}" class="back">
            ← Kembali ke Komite
        </a>

        <h1>Kredensial</h1>

        <div class="content">
            <p>
                Halaman Kredensial digunakan untuk menampilkan
                informasi dan kegiatan kredensial keperawatan.
            </p>
        </div>

    </div>

</body>

</html>