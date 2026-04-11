<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <style>
        body {
            background-color: #FEFBF3;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #2D4263;
            /* Tambahan aksen dekoratif di background */
            background-image: radial-gradient(#ECDBBA 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .login-container {
            background-color: #ECDBBA;
            padding: 50px 40px;
            border-radius: 20px;
            width: 380px;
            box-shadow: 0 15px 35px rgba(45, 66, 99, 0.1);
            position: relative;
            overflow: hidden;
        }

        /* Hiasan sudut untuk kesan buku */
        .login-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #C84B31, #2D4263);
        }

        .logo-area {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-area span {
            font-size: 3rem;
            display: block;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            color: #2D4263;
            margin: 0;
            font-size: 1.6rem;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            display: block;
            font-size: 0.9rem;
            opacity: 0.7;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid rgba(45, 66, 99, 0.1);
            border-radius: 10px;
            box-sizing: border-box;
            background-color: #FEFBF3;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #2D4263;
            box-shadow: 0 0 0 4px rgba(45, 66, 99, 0.05);
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            background-color: #C84B31;
            color: #FEFBF3;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(200, 75, 49, 0.3);
        }

        button:hover {
            background-color: #A93E28;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(200, 75, 49, 0.4);
        }

        .error-msg {
            color: #C84B31;
            font-size: 13px;
            text-align: center;
            background: rgba(200, 75, 49, 0.05);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 3px solid #C84B31;
        }

        p {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: rgba(45, 66, 99, 0.8);
        }

        a {
            color: #C84B31;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo-area">
        <span>📖</span>
        <h2>Selamat Datang</h2>
        <span class="subtitle">Masuk untuk melanjutkan membaca</span>
    </div>

    @if($errors->any())
        <div class="error-msg">❌ {{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="input-group">
            <input type="email" name="email" placeholder="Email Anda" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Kata Sandi" required>
        </div>
        <button type="submit">Masuk</button>
    </form>

</div>

</body>
</html>