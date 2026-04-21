@extends('layouts.app')

@section('content')
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

/* HEADER */
.welcome-section {
    background: linear-gradient(135deg, #1E293B, #334155);
    color: white;
    padding: 30px;
    border-radius: 16px;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    overflow: hidden;
}

/* glow effect */
.welcome-section::after {
    content: "";
    position: absolute;
    width: 250px;
    height: 250px;
    background: radial-gradient(circle, rgba(59,130,246,0.25), transparent 70%);
    top: -50px;
    right: -50px;
}

.welcome-text {
    position: relative;
    z-index: 2;
}

.welcome-text h2 {
    margin: 0;
    font-size: 1.6rem;
}

.welcome-text p {
    margin: 5px 0 0;
    opacity: 0.8;
    font-size: 0.9rem;
}

/* STATS */
.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

.stat-card {
    background: var(--card);
    padding: 22px;
    border-radius: 14px;
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 15px;
    transition: 0.25s;
    position: relative;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

/* subtle accent */
.stat-card::after {
    content: "";
    position: absolute;
    width: 80px;
    height: 80px;
    background: rgba(59,130,246,0.1);
    border-radius: 50%;
    top: -30px;
    right: -30px;
}

/* ICON */
.icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.3rem;
}

.bg-borrow {
    background: rgba(59,130,246,0.1);
    color: #3B82F6;
}

.bg-return {
    background: rgba(16,185,129,0.1);
    color: #059669;
}

.stat-info h4 {
    margin: 0;
    font-size: 0.75rem;
    color: var(--text-muted);
    text-transform: uppercase;
}

.stat-info h2 {
    margin: 4px 0 0;
    font-size: 1.8rem;
    color: var(--text);
}

/* QUICK ACTION */
.quick-action {
    margin-top: 25px;
    display: flex;
    gap: 15px;
}

.quick-action a {
    flex: 1;
    text-align: center;
    padding: 12px;
    background: var(--card);
    border-radius: 10px;
    border: 1px solid var(--border);
    text-decoration: none;
    color: var(--text);
    font-size: 0.85rem;
    transition: 0.2s;
}

.quick-action a:hover {
    background: var(--primary);
    color: white;
}

/* QUOTE */
.quote-box {
    margin-top: 30px;
    text-align: center;
    color: var(--text-muted);
    font-size: 0.85rem;
}

/* ANIMATION */
.stat-card {
    animation: fadeUp 0.5s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="welcome-section">
    <div class="welcome-text">
        <h2>Halo, {{ auth()->user()->name }}</h2>
        <p>Selamat datang kembali di sistem perpustakaan</p>
    </div>
    <div style="font-size: 3rem; opacity: 0.2;">📚</div>
</div>

<div class="stats-container">
    <div class="stat-card">
        <div class="icon-circle bg-borrow">📖</div>
        <div class="stat-info">
            <h4>Sedang Dipinjam</h4>
            <h2>{{ $dipinjam }}</h2>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon-circle bg-return">✔</div>
        <div class="stat-info">
            <h4>Selesai Dibaca</h4>
            <h2>{{ $dikembalikan }}</h2>
        </div>
    </div>
</div>

<div class="quick-action">
    <a href="/user/books">Lihat Buku</a>
    <a href="/user/transaksi">Riwayat</a>
</div>

<div class="quote-box">
    Konsistensi membaca setiap hari akan membangun pengetahuan jangka panjang
</div>

@endsection