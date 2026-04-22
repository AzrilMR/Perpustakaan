<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perpustakaan Digital</title>

<style>
:root {
    --primary: #1E293B;
    --accent: #3B82F6;
    --text: #0F172A;
    --text-muted: #64748B;
}

/* FIX GLOBAL (INI KUNCI) */
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    overflow-x: hidden; /* hilangkan geser kanan */
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 20px 40px;
    position: absolute;

    left: 0;
    right: 0; /* ganti width:100% */

    z-index: 10;
    color: white;
}

.navbar a {
    margin-left: 15px;
    text-decoration: none;
    color: white;
}

/* HERO */
.hero {
    height: 100vh;
    display: flex;
    align-items: center;

    padding: 0 60px;
    position: relative;
    color: white;
    overflow: hidden;
}

/* BACKGROUND */
.hero-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}

/* IMAGE */
.hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    transform: scale(1.2);
    opacity: 0;
    transition: all 1.5s ease;
}

/* OVERLAY */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.55);
    z-index: 1;
}

/* CONTENT */
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 600px;

    opacity: 0;
    transform: translateY(40px);
    transition: all 1s ease;
}

/* ACTIVE */
.hero.show .hero-bg img {
    transform: scale(1);
    opacity: 1;
}

.hero.show .hero-content {
    opacity: 1;
    transform: translateY(0);
}

/* TEXT */
.hero h2 {
    font-size: 3rem;
    margin-bottom: 15px;
}

.hero p {
    color: #ddd;
}

/* BUTTON */
.hero .btn {
    margin-top: 25px;
    display: inline-block;
    padding: 12px 22px;
    background: var(--primary);
    color: white;
    border-radius: 10px;
    text-decoration: none;
    transition: 0.2s;
}

.hero .btn:hover {
    transform: translateY(-2px);
    background: #0F172A;
}

/* FEATURES */
.features {
    padding: 60px 40px;
    text-align: center;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
}

.feature-card {
    background: #F1F5F9;
    padding: 25px;
    border-radius: 16px;
    border: 1px solid #E2E8F0;
    transition: 0.25s;
}

.feature-card:hover {
    transform: translateY(-6px);
}

/* CTA */
.cta {
    margin: 60px 40px;
    padding: 60px;
    border-radius: 20px;
    background: linear-gradient(135deg, #1E293B, #334155);
    color: white;
    text-align: center;
}

.cta a {
    margin-top: 20px;
    display: inline-block;
    padding: 12px 20px;
    background: white;
    color: var(--primary);
    border-radius: 10px;
    text-decoration: none;
}

/* FOOTER */
.footer {
    text-align: center;
    padding: 20px;
    color: #64748B;
    font-size: 0.8rem;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <strong>Perpustakaan</strong>
    <div>
        <a href="/login">Masuk</a>
        <a href="/register">Daftar</a>
    </div>
</div>

<!-- HERO -->
<section class="hero" id="hero">

    <div class="hero-bg">
        <img src="/images/pexels.jpg" alt="Perpustakaan">
    </div>

    <div class="hero-content">
        <h2>Perpustakaan Digital</h2>
        <p>Temukan, pinjam, dan kelola buku dengan sistem yang cepat dan efisien.</p>
        <a href="/login" class="btn">Mulai Sekarang</a>
    </div>

</section>

<!-- FEATURES -->
<section class="features">
    <h2>Fitur Utama</h2>

    <div class="feature-grid">
        <div class="feature-card">
            <h3>Pencarian Cepat</h3>
            <p>Temukan buku hanya dalam hitungan detik.</p>
        </div>

        <div class="feature-card">
            <h3>Peminjaman Mudah</h3>
            <p>Proses pinjam cepat tanpa ribet.</p>
        </div>

        <div class="feature-card">
            <h3>Riwayat Lengkap</h3>
            <p>Lihat semua aktivitas Anda dengan jelas.</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <h2>Bergabung Dengan Kami</h2>
    <p>Daftar dan rasakan kemudahan sistem perpustakaan digital.</p>
    <a href="/register">Daftar Sekarang</a>
</section>

<!-- FOOTER -->
<div class="footer">
    © 2026 Perpustakaan Digital
</div>

<!-- ANIMATION -->
<script>
window.addEventListener("load", function () {
    const hero = document.getElementById("hero");

    setTimeout(() => {
        hero.classList.add("show");
    }, 200);
});
</script>

</body>
</html>