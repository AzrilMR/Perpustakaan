@extends('layouts.app')

@section('content')
<style>
    /* 1. Welcome Banner */
    .admin-banner {
        background: #2D4263; /* Forest Green */
        color: #FEFBF3;
        padding: 35px;
        border-radius: 15px;
        margin-bottom: 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 20px rgba(45, 66, 99, 0.2);
    }

    .admin-banner h2 {
        margin: 0;
        font-size: 2rem;
        letter-spacing: 1px;
    }

    .admin-banner p {
        margin: 10px 0 0 0;
        opacity: 0.8;
        font-size: 1.1rem;
    }

    /* 2. Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid rgba(45, 66, 99, 0.08);
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* Decorative background shape */
    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        background: #ECDBBA;
        opacity: 0.2;
        border-radius: 50%;
        top: -40px;
        right: -40px;
    }

    .stat-card h4 {
        margin: 0;
        font-size: 0.85rem;
        color: #777;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .stat-card h2 {
        margin: 10px 0 0 0;
        font-size: 2.2rem;
        color: #2D4263;
        font-weight: 800;
    }

    .stat-footer {
        margin-top: 15px;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Accent Colors */
    .text-terra { color: #C84B31; }
    .text-green { color: #2D4263; }
</style>

<div class="admin-banner">
    <div class="banner-text">
        <h2>Panel Kendali Admin </h2>
        <p>Selamat bekerja kembali! Berikut ringkasan statistik perpustakaan Anda hari ini.</p>
    </div>
    <div style="font-size: 4rem; opacity: 0.2;">📊</div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h4>Total Koleksi</h4>
        <h2>{{ $totalBuku }}</h2>
        <div class="stat-footer text-green">📚 Buku Terdaftar</div>
    </div>

    <div class="stat-card">
        <h4>Anggota</h4>
        <h2>{{ $totalUser }}</h2>
        <div class="stat-footer text-green">👥 User Aktif</div>
    </div>

    <div class="stat-card">
        <h4>Total Transaksi</h4>
        <h2>{{ $totalTransaksi }}</h2>
        <div class="stat-footer text-green">📑 Riwayat Aktivitas</div>
    </div>

    <div class="stat-card" style="border-bottom: 4px solid #C84B31;">
        <h4 class="text-terra">Sedang Dipinjam</h4>
        <h2 class="text-terra">{{ $dipinjam }}</h2>
        <div class="stat-footer">⏳ Menunggu Pengembalian</div>
    </div>

    <div class="stat-card" style="border-bottom: 4px solid #2D4263;">
        <h4>Telah Kembali</h4>
        <h2>{{ $dikembalikan }}</h2>
        <div class="stat-footer text-green">✅ Transaksi Selesai</div>
    </div>
</div>

<div style="margin-top: 40px; text-align: right; color: #aaa;">
    <small>Data sinkron otomatis dengan sistem database.</small>
</div>

@endsection