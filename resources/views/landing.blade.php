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
    --background: #F1F5F9;
    --card: rgba(255,255,255,0.8);
    --text: #0F172A;
    --text-muted: #64748B;
    --border: #E2E8F0;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: var(--background);
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 20px 40px;
    position: sticky;
    top: 0;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(10px);
    z-index: 100;
}

.navbar a {
    margin-left: 15px;
    text-decoration: none;
    color: var(--text);
}

.btn-primary {
    background: var(--primary);
    color: white;
    padding: 8px 14px;
    border-radius: 8px;
}

/* HERO */
.hero {
    padding: 120px 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

/* glow background */
.hero::before {
    content: "";
    position: absolute;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(59,130,246,0.3), transparent 70%);
    top: -100px;
    right: -100px;
}

/* subtle pattern */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(#cbd5f5 0.6px, transparent 0.6px);
    background-size: 20px 20px;
    opacity: 0.3;
}

.hero h2 {
    font-size: 3rem;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.hero p {
    max-width: 600px;
    margin: auto;
    color: var(--text-muted);
    position: relative;
    z-index: 2;
}

.hero .btn {
    margin-top: 25px;
    display: inline-block;
    padding: 12px 22px;
    background: var(--primary);
    color: white;
    border-radius: 10px;
    text-decoration: none;
    position: relative;
    z-index: 2;
    transition: 0.2s;
}

.hero .btn:hover {
    transform: translateY(-2px);
}

/* STATS */
.stats {
    display: flex;
    justify-content: center;
    gap: 40px;
    padding: 40px;
}

.stats div {
    text-align: center;
}

.stats h3 {
    margin: 0;
    font-size: 1.6rem;
}

.stats p {
    margin: 5px 0 0;
    color: var(--text-muted);
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
    background: var(--card);
    backdrop-filter: blur(10px);
    padding: 25px;
    border-radius: 16px;
    border: 1px solid var(--border);
    transition: 0.25s;
}

.feature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.05);
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
    color: var(--text-muted);
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
<section class="hero">
    <h2>Perpustakaan Digital</h2>
    <p>Temukan, pinjam, dan kelola buku dengan sistem yang cepat dan efisien.</p>
    <a href="/register" class="btn">Mulai Sekarang</a>
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
    <h2>Mulai Sekarang</h2>
    <p>Daftar dan rasakan kemudahan sistem perpustakaan digital.</p>
    <a href="/register">Daftar Sekarang</a>
</section>

<!-- FOOTER -->
<div class="footer">
    © 2026 Perpustakaan Digital
</div>

</body>
</html>