@extends('layouts.app')

@section('content')
<style>
    /* Header Style */
    .header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    h1 {
        color: #2D4263;
        font-size: 1.8rem;
        margin: 0;
    }

    /* Button Tambah */
    .btn-add {
        background-color: #C84B31; /* Terracotta */
        color: #FEFBF3;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-add:hover {
        background-color: #A93E28;
    }

    /* Table Style - Cozy Theme (Sama dengan Data Anggota) */
    .table-container {
        background: #ECDBBA; /* Beige */
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: #2D4263;
    }

    th {
        background-color: #2D4263; /* Forest Green */
        color: #FEFBF3;
        text-align: left;
        padding: 15px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid rgba(45, 66, 99, 0.1);
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: rgba(254, 251, 243, 0.4);
    }

    /* Action Buttons */
    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-edit {
        color: #2D4263;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #2D4263;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .btn-edit:hover {
        background: #2D4263;
        color: #FEFBF3;
    }

    .btn-delete {
        background: transparent;
        color: #C84B31;
        border: 1px solid #C84B31;
        padding: 5px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        font-size: 0.85rem;
    }

    .btn-delete:hover {
        background: #C84B31;
        color: #FEFBF3;
    }

    /* Alert Style */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-weight: 500;
    }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>

<div class="header-flex">
    <h1>Daftar Koleksi Buku</h1>
    <a href="/admin/books/create" class="btn-add">+ Tambah Buku</a>
</div>

@if(session('success'))
    <div class="alert alert-success">✨ {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
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
                    <span style="background: #FEFBF3; padding: 2px 8px; border-radius: 4px; font-weight: bold;">
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