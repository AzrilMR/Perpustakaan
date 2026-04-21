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

    /* Header */
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

    /* Button Tambah */
    .btn-add {
        background: var(--primary);
        color: white;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: 0.2s;
    }

    .btn-add:hover {
        opacity: 0.9;
    }

    /* Table Container */
    .table-container {
        background: var(--card);
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--border);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: var(--text);
    }

    th {
        background: #F8FAFC;
        color: var(--text-muted);
        text-align: left;
        padding: 14px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    td {
        padding: 14px;
        border-top: 1px solid var(--border);
        font-size: 0.9rem;
    }

    tr:hover td {
        background-color: #F9FAFB;
    }

    /* Action Buttons */
    .actions {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        color: var(--text);
        text-decoration: none;
        border: 1px solid var(--border);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: var(--primary);
        color: white;
    }

    .btn-delete {
        background: transparent;
        color: var(--danger);
        border: 1px solid var(--danger);
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.8rem;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: var(--danger);
        color: white;
    }

    /* Stok badge */
    td span {
        background: #F1F5F9 !important;
        padding: 2px 8px;
        border-radius: 6px;
        font-weight: 600;
        color: var(--text);
    }

    /* Alert */
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

    <div class="container">
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

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $b)
            <tr>
                <td style="font-weight: 600;">{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun }}</td>
                <td>
                    <span>
                        {{ $b->stok }}
                    </span>
                </td>
                <td class="actions">
                    <a href="/admin/books/{{ $b->id }}/edit" class="btn-edit">Edit</a>
                    <form action="/admin/books/{{ $b->id }}" method="POST" onsubmit="return confirm('Hapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection