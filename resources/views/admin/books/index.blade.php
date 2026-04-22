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

    .header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    h1 {
        color: var(--text);
        font-size: 1.5rem;
        margin: 0;
    }

    .btn-add {
        background: var(--primary);
        color: white;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.9rem;
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

.card h3 {
    font-size: 1rem;
    margin: 5px 0;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    min-height: 40px; 
}

    .card p {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin: 2px 0;
    }

    .stok {
        margin-top: 8px;
        display: inline-block;
        background: #F1F5F9;
        margin-bottom: 10px;
        padding: 4px 8px;
        border-radius: 6px;
        font-weight: 600;
    }

    .actions {
        display: flex;
        gap: 8px;
        margin-top: auto;
    }

    .btn-edit {
        flex: 1;
        text-align: center;
        border: 1px solid var(--border);
        padding: 6px;
        border-radius: 6px;
        font-size: 0.8rem;
        text-decoration: none;
        color: var(--text);
    }

    .btn-delete {
        flex: 1;
        border: 1px solid var(--danger);
        color: var(--danger);
        padding: 6px;
        background: transparent;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .alert {
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-size: 0.9rem;
        border: 1px solid;
    }

    .alert-success {
        background: #ECFDF5;
        color: #065F46;
        border-color: #A7F3D0;
    }

    .alert-error {
        background: #FEF2F2;
        color: #991B1B;
        border-color: #FCA5A5;
    }
</style>

<div class="header-flex">
    <h1>Daftar Koleksi Buku</h1>
    <a href="/admin/books/create" class="btn-add">+ Tambah Buku</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="grid">
@foreach($books as $b)
<div class="card">

    <!-- COVER FIX -->
    <div class="cover">
        <img src="/covers/{{ $b->cover }}">
    </div>

    <h3>{{ $b->judul }}</h3>

    <p>{{ $b->penulis }}</p>
    <p>{{ $b->penerbit }}</p>
    <p>Tahun: {{ $b->tahun }}</p>

    <span class="stok">Stok: {{ $b->stok }}</span>

    <div class="actions">
        <a href="/admin/books/{{ $b->id }}/edit" class="btn-edit">Edit</a>

        <form action="/admin/books/{{ $b->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-delete">Hapus</button>
        </form>
    </div>

</div>
@endforeach
</div>

@endsection