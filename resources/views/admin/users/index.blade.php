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

    /* Table Style - Cozy Theme */
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
        background-color: rgba(236, 219, 186, 0.5);
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: rgba(254, 251, 243, 0.4); /* Highlight Cream saat hover */
    }

    /* Button Style */
    .btn-delete {
        background-color: transparent;
        color: #C84B31; /* Terracotta */
        border: 1px solid #C84B31;
        padding: 6px 15px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #C84B31;
        color: #FEFBF3;
    }

    /* Alert Style */
    .alert {
        padding: 12px 20px;
        border-radius: 8px;
        margin-top: 20px;
        font-weight: 500;
    }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>

<div class="header-section">
    <h2>Data Anggota Perpustakaan</h2>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Alamat Email</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td style="font-weight: 600;">{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td style="text-align: center;">
                    <form method="POST" action="/admin/users/{{ $u->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">
                            Hapus Anggota
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(session('success'))
    <div class="alert alert-success">✨ {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
@endif

@endsection