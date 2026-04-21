@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #1E293B;       /* Navy */
        --background: #F1F5F9;    /* Soft Grey */
        --card: #FFFFFF;
        --text: #0F172A;
        --text-muted: #64748B;
        --border: #E2E8F0;
        --danger: #DC2626;
    }

    body {
        background: var(--background);
    }

    /* BANNER */
    .admin-banner {
        background: var(--primary);
        color: white;
        padding: 25px 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-banner h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .admin-banner p {
        margin: 6px 0 0 0;
        font-size: 0.9rem;
        opacity: 0.85;
    }

    .banner-icon {
        font-size: 3rem;
        opacity: 0.15;
    }

    /* GRID */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    /* CARD */
    .stat-card {
        background: var(--card);
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    }

    .stat-card h4 {
        margin: 0;
        font-size: 0.75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stat-card h2 {
        margin: 8px 0 0 0;
        font-size: 1.8rem;
        color: var(--text);
        font-weight: 600;
    }

    .stat-footer {
        margin-top: 12px;
        font-size: 0.8rem;
        color: var(--text-muted);
    }

    /* ACCENT */
    .card-primary {
        border-left: 4px solid var(--primary);
    }

    .card-danger {
        border-left: 4px solid var(--danger);
    }

    .danger {
        color: var(--danger);
    }

    /* FOOTER NOTE */
    .footer-note {
        margin-top: 40px;
        text-align: right;
        color: var(--text-muted);
        font-size: 0.8rem;
    }
</style>

<div class="admin-banner">
    <div>
        <h2>Panel Kendali Admin</h2>
        <p>Ringkasan statistik perpustakaan Anda hari ini.</p>
    </div>
    <div class="banner-icon">📊</div>
</div>

<div class="stats-grid">
    <div class="stat-card card-primary">
        <h4>Total Koleksi</h4>
        <h2>{{ $totalBuku }}</h2>
        <div class="stat-footer">Buku Terdaftar</div>
    </div>

    <div class="stat-card card-primary">
        <h4>Anggota</h4>
        <h2>{{ $totalUser }}</h2>
        <div class="stat-footer">User Aktif</div>
    </div>

    <div class="stat-card card-primary">
        <h4>Total Transaksi</h4>
        <h2>{{ $totalTransaksi }}</h2>
        <div class="stat-footer">Riwayat Aktivitas</div>
    </div>

    <div class="stat-card card-danger">
        <h4 class="danger">Sedang Dipinjam</h4>
        <h2 class="danger">{{ $dipinjam }}</h2>
        <div class="stat-footer">Menunggu Pengembalian</div>
    </div>

    <div class="stat-card card-primary">
        <h4>Telah Kembali</h4>
        <h2>{{ $dikembalikan }}</h2>
        <div class="stat-footer">Transaksi Selesai</div>
    </div>
</div>

<div class="footer-note">
    Data sinkron otomatis dengan sistem database.
</div>

@endsection