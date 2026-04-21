@extends('layouts.app')

@section('content')
<style>
:root {
    --primary: #1E293B;
    --background: #F1F5F9;
    --card: #FFFFFF;
    --text: #0F172A;
    --text-muted: #64748B;
    --border: #E2E8F0;
    --danger: #DC2626;
    --success: #16A34A;
    --warning: #F59E0B;
}

/* HEADER */
.header-section {
    margin-bottom: 20px;
}

.header-section h2 {
    font-size: 1.5rem;
    color: var(--text);
}

/* ALERT */
.alert {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 0.9rem;
}

.alert-success {
    background: #ECFDF5;
    color: #065F46;
}

.alert-error {
    background: #FEF2F2;
    color: #991B1B;
}

/* GRID */
.transaction-grid {
    display: grid;
    gap: 15px;
}

/* CARD */
.transaction-card {
    background: var(--card);
    border-radius: 12px;
    padding: 18px;
    border: 1px solid var(--border);
    transition: 0.25s;
}

.transaction-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* TITLE */
.book-info h3 {
    margin: 0 0 10px;
    font-size: 1.1rem;
}

/* INFO */
.book-info p {
    margin: 4px 0;
    font-size: 0.85rem;
    color: var(--text-muted);
}

/* STATUS BADGE */
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 0.75rem;
    margin-top: 8px;
}

.status-dipinjam {
    background: #FEF3C7;
    color: #92400E;
}

.status-kembali {
    background: #DCFCE7;
    color: #166534;
}

.status-terlambat {
    background: #FEE2E2;
    color: #991B1B;
}

/* BUTTON */
.btn-perpanjang {
    margin-top: 10px;
    background: var(--primary);
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: 0.2s;
}

.btn-perpanjang:hover {
    background: #0F172A;
}

/* EMPTY */
.empty-state {
    text-align: center;
    padding: 50px;
    color: var(--text-muted);
}
</style>

<div class="header-section">
    <h2>Riwayat Peminjaman</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

<div class="transaction-grid">
@forelse($transactions as $t)

@php
    $isLate = $t->status == 'dipinjam' && $t->tanggal_jatuh_tempo && now()->gt($t->tanggal_jatuh_tempo);
@endphp

<div class="transaction-card">
    <div class="book-info">

        <h3>{{ $t->book->judul ?? 'Buku tidak ditemukan' }}</h3>

        <p>Pinjam: {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d M Y') }}</p>

        <p>Jatuh tempo: 
            {{ $t->tanggal_jatuh_tempo 
                ? \Carbon\Carbon::parse($t->tanggal_jatuh_tempo)->format('d M Y') 
                : '-' }}
        </p>

        <p>Kembali: 
            {{ $t->tanggal_kembali 
                ? \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') 
                : 'Belum dikembalikan' }}
        </p>

        <p>Denda: Rp {{ number_format($t->denda, 0, ',', '.') }}</p>

        <p>Perpanjangan: {{ $t->perpanjangan }}x</p>

        {{-- STATUS --}}
        @if($isLate)
            <span class="badge status-terlambat">Terlambat</span>
        @elseif($t->status == 'dipinjam')
            <span class="badge status-dipinjam">Dipinjam</span>
        @else
            <span class="badge status-kembali">Selesai</span>
        @endif

        {{-- BUTTON --}}
        @if($t->status == 'dipinjam' && $t->perpanjangan < 1)
            <form method="POST" action="/user/perpanjang/{{ $t->id }}">
                @csrf
                <button class="btn-perpanjang">
                    Perpanjang 7 Hari
                </button>
            </form>
        @endif

    </div>
</div>

@empty
<div class="empty-state">
    <p>Belum ada riwayat peminjaman</p>
</div>
@endforelse
</div>

@endsection