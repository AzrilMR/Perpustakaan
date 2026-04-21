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
    .header-section {
        margin-bottom: 25px;
    }

    h1 {
        color: var(--text);
        font-size: 1.5rem;
        margin: 0;
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
        background: transparent;
    }

    tr:hover td {
        background-color: #F9FAFB;
    }

    /* Button */
    .btn-delete {
        background: transparent;
        color: var(--danger);
        border: 1px solid var(--danger);
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: var(--danger);
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
    <h1>Data Anggota Perpustakaan</h1>
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
    <div class="alert alert-success"> {{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error"> {{ session('error') }}</div>
@endif

@endsection