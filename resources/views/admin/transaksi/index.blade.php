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
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: rgba(254, 251, 243, 0.4); /* Highlight Cream */
    }

    /* Badge Status */
    .badge {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: bold;
        text-transform: capitalize;
    }
    .status-pinjam { background: #fdf6e3; color: #b58900; border: 1px solid #b58900; }
    .status-kembali { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }

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
    <h2>Data Transaksi Perpustakaan</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">✨ {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
@endif

<div class="table-container" style="margin-top: 20px;">
    <table>
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
        <tr>
            <td style="font-weight: 600;">{{ $t->user->name }}</td>
            <td>{{ $t->book->judul ?? 'Buku dihapus' }}</td>

            <td>
                <span class="badge {{ $t->status == 'dipinjam' ? 'status-pinjam' : 'status-kembali' }}">
                    {{ $t->status }}
                </span>
            </td>

            <td>
                {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d M Y') }}
            </td>

            <td>
                {{ $t->tanggal_kembali 
                    ? \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') 
                    : '-' }}
            </td>

            <td style="text-align: center;">
                <form method="POST" action="/admin/transaksi/{{ $t->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete"
                        onclick="return confirm('Yakin ingin menghapus riwayat transaksi ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection