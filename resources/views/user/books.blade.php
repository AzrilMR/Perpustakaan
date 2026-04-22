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
}

/* HEADER */
h1 {
    margin-bottom: 20px;
    font-size: 1.5rem;
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
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
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
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
}

/* CARD */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 15px;
    display: flex;
    flex-direction: column;
}

/* COVER */
.cover {
    width: 100%;
    aspect-ratio: 3 / 4;
    background: #F8FAFC;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 10px;
}

.cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* TITLE */
.card h3 {
    font-size: 1rem;
    margin: 5px 0;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    min-height: 40px;
}

/* INFO */
.card p {
    font-size: 0.85rem;
    color: var(--text-muted);
    margin: 2px 0;
}

/* STOK */
.stok {
    margin-top: 8px;
    display: inline-block;
    background: #F1F5F9;
    margin-bottom: 10px;
    padding: 4px 8px;
    border-radius: 6px;
    font-weight: 600;
}

/* ACTION */
.actions {
    margin-top: auto;
}

/* BUTTON */
.btn {
    width: 100%;
    padding: 8px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    background: var(--primary);
    color: white;
    font-size: 0.85rem;
}

.btn:hover {
    background: #0F172A;
}

/* EMPTY */
.empty {
    background: #FEF2F2;
    color: #991B1B;
    padding: 6px;
    border-radius: 6px;
    font-size: 0.8rem;
    text-align: center;
}

/* PAGINATION (custom) */
.custom-pagination {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-top: 25px;
}

.custom-pagination a,
.custom-pagination span {
    padding: 6px 10px;
    border-radius: 6px;
    border: 1px solid #E2E8F0;
    font-size: 0.8rem;
    text-decoration: none;
    color: #0F172A;
}

.custom-pagination a:hover {
    background: #1E293B;
    color: #fff;
}

.custom-pagination .active {
    background: #1E293B;
    color: #fff;
    font-weight: 600;
}

.custom-pagination .disabled {
    opacity: 0.4;
    pointer-events: none;
}

</style>

<h1>Daftar Buku</h1>

<form method="GET" action="/user/books" class="search-box">
    <input 
        type="text" 
        name="search" 
        placeholder="Cari judul atau penulis..."
        value="{{ $search ?? '' }}"
    >
    <button type="submit">Search</button>
</form>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-error">{{ session('error') }}</div>
@endif

<div class="grid">
@foreach($books as $b)
<div class="card">

    <div class="cover">
        <img src="/covers/{{ $b->cover }}">
    </div>

    <h3 title="{{ $b->judul }}">{{ $b->judul }}</h3>

    <p>{{ $b->penulis }}</p>
    <p>{{ $b->penerbit }}</p>
    <p>Tahun: {{ $b->tahun }}</p>

    <span class="stok">Stok: {{ $b->stok }}</span>

    <div class="actions">
        @if($b->stok > 0)
        <form method="POST" action="/user/pinjam/{{ $b->id }}">
            @csrf
            <button class="btn">Pinjam</button>
        </form>
        @else
        <div class="empty">Stok Habis</div>
        @endif
    </div>

</div>
@endforeach
</div>

{{ $books->links('pagination.custom') }}

@endsection