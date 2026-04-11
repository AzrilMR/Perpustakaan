@extends('layouts.app')

@section('content')
<style>
    /* Header Style */
    .header-section {
        margin-bottom: 30px;
    }

    h2 {
        color: #2D4263;
        font-size: 1.8rem;
        margin: 0;
    }

    /* Card Style - Cozy Theme */
    .transaction-card {
        background: #ECDBBA; /* Beige */
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-left: 5px solid #2D4263; /* Accent line */
    }

    .book-info h3 {
        margin: 0 0 10px 0;
        color: #2D4263;
        font-size: 1.2rem;
    }

    .book-info p {
        margin: 5px 0;
        font-size: 0.9rem;
        color: #555;
    }

    /* Badge Status */
    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: bold;
        text-transform: uppercase;
    }
    .status-dipinjam { background: #fdf6e3; color: #b58900; border: 1px solid #b58900; }
    .status-kembali { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }

    /* Button Style */
    .btn-return {
        background-color: #C84B31; /* Terracotta */
        color: #FEFBF3;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-return:hover {
        background-color: #A93E28;
        transform: translateY(-2px);
    }

    /* Alert Style */
    .alert {
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
    }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>

<div class="header-section">
    <h2>Riwayat Peminjaman Anda</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">✨ {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
@endif

@forelse($transactions as $t)
<div class="transaction-card">
    <div class="book-info">
        <h3>{{ $t->book->judul ?? 'Buku tidak ditemukan' }}</h3>
        <p>📅 <b>Pinjam:</b> {{ $t->tanggal_pinjam }}</p>
        <p>⌛ <b>Kembali:</b> {{ $t->tanggal_kembali ?? 'Belum dikembalikan' }}</p>
        <span class="badge {{ $t->status == 'dipinjam' ? 'status-dipinjam' : 'status-kembali' }}">
            {{ $t->status }}
        </span>
    </div>

    @if($t->status == 'dipinjam')
    <div class="action-area">
        <form method="POST" action="/user/kembali/{{ $t->id }}">
            @csrf
            <button type="submit" class="btn-return" onclick="return confirm('Sudah yakin ingin mengembalikan buku ini?')">
                Kembalikan Buku
            </button>
        </form>
    </div>
    @endif
</div>
@empty
<div style="text-align: center; padding: 50px; color: #666;">
    <p>Anda belum memiliki riwayat peminjaman buku.</p>
</div>
@endforelse

@endsection