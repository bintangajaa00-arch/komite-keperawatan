<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Komite Keperawatan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo h1 {
            color: #1e3a8a;
            font-size: 24px;
            margin-bottom: 7px;
        }

        .logo p {
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 7px;
            color: #1f2937;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">
            <h1>Komite Keperawatan</h1>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="login_name">Username</label>

                <input type="text" id="login_name" name="name" value="{{ old('name') }}" placeholder="Masukkan username"
                    autocomplete="username" required autofocus>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="login_password">Password</label>

                <input type="password" id="login_password" name="password" placeholder="Masukkan password"
                    autocomplete="current-password" required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button">Login</button>
        </form>
    </div>
</body>

</html>