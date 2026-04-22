<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Perpustakaan</title>

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

/* FIX UTAMA */
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

/* LEFT */
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

/* glow */
.left::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.25), transparent 70%);
    top: -50px;
    right: -50px;
}

/* pattern */
.left::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
    background-size: 22px 22px;
}

/* animasi masuk kiri */
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

/* LOGIN BOX */
.login-box {
    width: 360px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 16px;
    border: 1px solid var(--border);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    position: relative;
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
    padding: 12px 14px; /* FIX */
    margin-bottom: 14px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: #F8FAFC;
    transition: all 0.25s ease;
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
    padding: 12px 14px; /* DISAMAKAN */
    background: linear-gradient(135deg, #1E293B, #334155);
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30,41,59,0.2);
}

button:active {
    transform: scale(0.98);
}

    .auth-footer {
    margin-top: 15px;
    text-align: center;
    font-size: 0.85rem;
    color: var(--text-muted);
}

.auth-footer a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
}

.auth-footer a:hover {
    text-decoration: underline;
}

/* ERROR */
.error-msg {
    background: #FEF2F2;
    color: #991B1B;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 14px;
    font-size: 0.85rem;
    animation: fadeUp 0.4s ease;
}

.alert-success {
    background: #ECFDF5;
    color: #065F46;
    border: 1px solid #A7F3D0;
    padding: 12px 16px;
    border-radius: 10px;
    margin-bottom: 15px;
    font-size: 0.9rem;
    animation: fadeIn 0.5s ease;
}

/* animasi */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ANIMATIONS */
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
   

    <div class="left">
        <div class="left-content">
            <h1>Perpustakaan</h1>
            <p>Tingkatkan pengetahuan Anda dengan membaca buku</p>
        </div>
    </div>

    <div class="right">
        <div class="login-box">
             @if(session('success'))
                <div class="alert-success"> {{ session('success') }}
                </div>
@endif
            <h2>Masuk</h2>
            <div class="subtitle">Silakan login ke akun Anda</div>

            @if($errors->any())
                <div class="error-msg">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
                <div class="auth-footer">Belum punya akun? <a href="/register">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>