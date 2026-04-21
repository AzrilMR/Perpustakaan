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
    --danger: #DC2626;
    --success: #16A34A;
}

/* TITLE */
h2 {
    margin-bottom: 15px;
}

/* SEARCH */
.search-box {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.search-box input {
    flex: 1;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid var(--border);
}

.search-box button {
    padding: 10px 16px;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

/* ALERT */
.alert {
    padding: 10px;
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
.book-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    align-items: stretch; /* penting */
}

/* CARD */
.card {
    background: var(--card);
    padding: 18px;
    border-radius: 12px;
    border: 1px solid var(--border);
    transition: 0.25s;

    display: flex;
    flex-direction: column;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

.card h3 {
    margin-top: 0;
    font-size: 1.1rem;
}

/* INFO */
.card p {
    margin: 4px 0;
    font-size: 0.85rem;
    color: var(--text-muted);
}

/* BADGE */
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
    margin-top: 8px;
    width: fit-content;
}

.available {
    background: #DCFCE7;
    color: #166534;
}

.empty {
    background: #FEF2F2;
    color: #991B1B;
}

/* FORM (kunci tombol sejajar) */
.card form {
    margin-top: auto;
}

/* BUTTON */
.btn {
    margin-top: 12px;
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    background: var(--primary);
    color: white;
    font-weight: 500;
}

.btn:hover {
    background: #0F172A;
}

/* EMPTY */
.empty-text {
    color: var(--danger);
}
</style>

<h2>Daftar Buku</h2>

<!-- SEARCH -->
<form method="GET" action="/user/books" class="search-box">
    <input 
        type="text" 
        name="search" 
        placeholder="Cari judul atau penulis..."
        value="{{ $search ?? '' }}"
    >
    <button type="submit">Search</button>
</form>

<!-- FEEDBACK -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<!-- EMPTY -->
@if($books->isEmpty())
    <p class="empty-text">Buku tidak ditemukan</p>
@endif

<!-- LIST -->
<div class="book-grid">
@foreach($books as $b)
<div class="card">

    <h3>{{ $b->judul }}</h3>

    <p>Penulis: {{ $b->penulis }}</p>
    <p>Penerbit: {{ $b->penerbit ?? '-' }}</p>
    <p>Tahun: {{ $b->tahun ?? '-' }}</p>

    @if($b->stok > 0)
        <span class="badge available">Tersedia ({{ $b->stok }})</span>

        <form method="POST" action="/user/pinjam/{{ $b->id }}">
            @csrf
            <button type="submit" class="btn">Pinjam</button>
        </form>
    @else
        <span class="badge empty">Stok Habis</span>
    @endif

</div>
@endforeach
</div>

@endsection