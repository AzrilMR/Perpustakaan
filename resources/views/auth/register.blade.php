<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Perpustakaan</title>
    <style>
        body {
            background-color: #FEFBF3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #2D4263;
            background-image: radial-gradient(#ECDBBA 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .box {
            background-color: #ECDBBA;
            padding: 45px;
            border-radius: 25px;
            width: 400px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .header-register {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-register h2 {
            margin: 0;
            font-size: 1.8rem;
            color: #2D4263;
        }

        .header-register p {
            margin: 5px 0 0 0;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        input {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 1px solid rgba(45, 66, 99, 0.1);
            border-radius: 12px;
            box-sizing: border-box;
            background-color: #FEFBF3;
            font-size: 14px;
            transition: transform 0.2s, border 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #C84B31;
            transform: scale(1.01);
        }

        button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #2D4263; /* Forest Green untuk Daftar agar beda dengan Login */
            color: #FEFBF3;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #1a2a40;
            box-shadow: 0 5px 15px rgba(45, 66, 99, 0.3);
        }

        .footer-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
        }

        .footer-link a {
            color: #C84B31;
            text-decoration: none;
            font-weight: bold;
        }

        .icon-badge {
            background: #FEFBF3;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: 0 auto 15px;
            font-size: 1.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="box">
    <div class="header-register">
        <div class="icon-badge">✨</div>
        <h2>Buat Akun</h2>
        <p>Bergabung dan mulai petualangan literasimu</p>
    </div>

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Alamat Email" required>
        <input type="password" name="password" placeholder="Buat Kata Sandi" required>

        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="footer-link">
        Sudah punya akun? <a href="/login">Masuk di sini</a>
    </div>
</div>

</body>
</html>