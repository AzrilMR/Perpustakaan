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

    /* Header */
    .header-section {
        margin-bottom: 25px;
    }

    h1 {
        color: var(--text);
        font-size: 1.5rem;
        margin: 0;
    }

    /* Table */
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
        background: #F9FAFB;
    }

    /* Badge */
    .badge {
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: capitalize;
    }

    .status-pinjam {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-kembali {
        background: #DCFCE7;
        color: #166534;
    }

    /* Buttons */
    .btn-delete {
        background: transparent;
        color: var(--danger);
        border: 1px solid var(--danger);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: var(--danger);
        color: white;
    }

    .btn-kembali {
        background: transparent;
        color: var(--primary);
        border: 1px solid var(--primary);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-kembali:hover {
        background: var(--primary);
        color: white;
    }

    /* Alert */
    .alert {
        padding: 12px;
        border-radius: 8px;
        margin-top: 20px;
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

<div class="header-section">
    <h1>Data Transaksi Perpustakaan</h1>
</div>

@if(session('success'))
    <div class="alert alert-success"> {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error"> {{ session('error') }}</div>
@endif

<div class="table-container" style="margin-top: 20px;">
    <table>
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td style="font-weight:600;">{{ $t->user->name }}</td>
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
                    {{ $t->tanggal_jatuh_tempo 
                        ? \Carbon\Carbon::parse($t->tanggal_jatuh_tempo)->format('d M Y') 
                        : '-' }}
                </td>

                <td>
                    {{ $t->tanggal_kembali 
                        ? \Carbon\Carbon::parse($t->tanggal_kembali)->format('d M Y') 
                        : '-' }}
                </td>

                <td style="font-weight:bold;">
                    Rp {{ number_format($t->denda, 0, ',', '.') }}
                </td>

                <td style="text-align:center; display:flex; gap:5px; justify-content:center;">
                    
                    @if($t->status == 'dipinjam')
                    <form method="POST" action="/admin/transaksi/kembali/{{ $t->id }}">
                        @csrf
                        <button type="submit" class="btn-kembali">
                            Kembalikan
                        </button>
                    </form>
                    @endif

                    <form method="POST" action="/admin/transaksi/{{ $t->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                            onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
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