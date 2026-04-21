<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar - Perpustakaan</title>

<style>
:root {
    --primary: #1E293B;
    --accent: #3B82F6;
    --background: #F1F5F9;
    --card: #FFFFFF;
    --text: #0F172A;
    --text-muted: #64748B;
    --border: #E2E8F0;
}

/* FIX GLOBAL */
* {
    box-sizing: border-box;
}

/* BODY */
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    height: 100vh;
    display: flex;
}

/* LAYOUT */
.container {
    display: flex;
    width: 100%;
}

/* LEFT (SAMA SEPERTI LOGIN) */
.left {
    flex: 1;
    background: linear-gradient(135deg, #1E293B, #0F172A);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.left::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
    background-size: 22px 22px;
}

.left-content {
    position: relative;
    z-index: 2;
    animation: fadeLeft 0.8s ease;
}

.left h1 {
    font-size: 2.2rem;
    margin-bottom: 10px;
}

.left p {
    opacity: 0.8;
    max-width: 300px;
}

/* RIGHT */
.right {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--background);
    position: relative;
}

/* pattern kanan */
.right::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(#cbd5f5 0.6px, transparent 0.6px);
    background-size: 20px 20px;
    opacity: 0.5;
}

/* FORM BOX */
.register-box {
    width: 360px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 16px;
    border: 1px solid var(--border);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    z-index: 2;
    animation: fadeUp 0.6s ease;
}

/* TEXT */
h2 {
    margin-bottom: 5px;
    font-size: 1.4rem;
}

.subtitle {
    font-size: 0.85rem;
    color: var(--text-muted);
    margin-bottom: 20px;
}

/* INPUT */
input {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 14px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: #F8FAFC;
    transition: 0.25s;
}

input:focus {
    outline: none;
    border-color: var(--accent);
    background: white;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

/* BUTTON */
button {
    width: 100%;
    padding: 12px 14px;
    background: linear-gradient(135deg, #1E293B, #334155);
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.2s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30,41,59,0.2);
}

/* FOOTER */
.footer-link {
    text-align: center;
    margin-top: 15px;
    font-size: 0.85rem;
}

.footer-link a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
}

/* ANIMASI */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* MOBILE */
@media(max-width: 768px) {
    .left {
        display: none;
    }
}
</style>
</head>
<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="left-content">
            <h1>Perpustakaan</h1>
            <p>Bergabung dan mulai perjalanan literasi Anda</p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="register-box">
            <h2>Daftar</h2>
            <div class="subtitle">Buat akun baru</div>

            <form method="POST" action="/register">
                @csrf
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Daftar</button>
            </form>

            <div class="footer-link">
                Sudah punya akun? <a href="/login">Masuk</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>