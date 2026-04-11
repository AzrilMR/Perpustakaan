@extends('layouts.app')

@section('content')
<style>
    /* 1. Header & Welcome Area */
    .welcome-section {
        background: #ECDBBA; /* Warna Beige khas tema */
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        border-left: 6px solid #C84B31; /* Aksen Terracotta */
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .welcome-text h2 {
        margin: 0;
        color: #2D4263;
        font-size: 1.8rem;
    }

    .welcome-text p {
        margin: 5px 0 0 0;
        color: #555;
        font-style: italic;
    }

    /* 2. Stats Grid */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        transition: transform 0.3s ease;
        border: 1px solid rgba(45, 66, 99, 0.05);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
    }

    .bg-borrow { background: rgba(200, 75, 49, 0.1); color: #C84B31; } /* Terracotta soft */
    .bg-return { background: rgba(45, 66, 99, 0.1); color: #2D4263; } /* Forest Green soft */

    .stat-info h4 {
        margin: 0;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #777;
    }

    .stat-info h2 {
        margin: 5px 0 0 0;
        font-size: 2rem;
        color: #2D4263;
    }

    /* 3. Aesthetic Tip Area */
    .quote-box {
        margin-top: 40px;
        padding: 20px;
        border-top: 1px solid #ECDBBA;
        text-align: center;
        color: #2D4263;
        opacity: 0.7;
    }
</style>

<div class="welcome-section">
    <div class="welcome-text">
        <h2>Halo, {{ auth()->user()->name }}! 👋</h2>
        <p>"Buku adalah jendela dunia, mari temukan petualanganmu hari ini."</p>
    </div>
    <div style="font-size: 3rem; opacity: 0.2;">📖</div>
</div>

<div class="stats-container">
    <div class="stat-card">
        <div class="icon-circle bg-borrow">🔖</div>
        <div class="stat-info">
            <h4>Sedang Dipinjam</h4>
            <h2>{{ $dipinjam }}</h2>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon-circle bg-return">✅</div>
        <div class="stat-info">
            <h4>Total Selesai Baca</h4>
            <h2>{{ $dikembalikan }}</h2>
        </div>
    </div>
</div>

<div class="quote-box">
    <small>Tingkatkan kebiasaan membacamu setiap hari!</small>
</div>

@endsection