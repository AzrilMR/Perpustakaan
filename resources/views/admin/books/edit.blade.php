<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <style>
        body {
            background: #F1F5F9;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #0F172A;
        }

        .container {
            width: 100%;
            max-width: 500px;
        }

        .box {
            background: white;
            padding: 35px;
            border-radius: 12px;
            border: 1px solid #E2E8F0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        h2 {
            margin: 0;
            font-size: 1.4rem;
        }

        .btn-back {
            text-decoration: none;
            font-size: 0.85rem;
            color: #64748B;
            border: 1px solid #E2E8F0;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .btn-back:hover {
            background: #F1F5F9;
        }

        .subtitle {
            font-size: 0.85rem;
            margin-bottom: 20px;
            color: #64748B;
        }

        label {
            font-size: 0.85rem;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .row {
            display: flex;
            gap: 10px;
        }

        .btn-update {
            width: 100%;
            background: #1E293B;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

            .alert {
        padding: 14px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid;
    }

    /* SUCCESS */
    .alert-success {
        background: #ECFDF5;
        color: #065F46;
        border-color: #A7F3D0;
    }

    /* ERROR */
    .alert-error {
        background: #FEF2F2;
        color: #991B1B;
        border-color: #FCA5A5;
    }

    /* WARNING */
    .alert-warning {
        background: #FFFBEB;
        color: #92400E;
        border-color: #FCD34D;
    }

    .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

        .btn-save {
        width: 100%;
        padding: 10px;
        background: #1E293B;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn-back {
        flex: 1;
        text-align: center;
        text-decoration: none;
        font-size: 0.9rem;
        color: #0F172A;
        border: 1px solid #E2E8F0;
        padding: 10px;
        border-radius: 8px;
    }

    .btn-back:hover {
        background: #F1F5F9;
    }

    .btn-save {
        flex: 1;
    }
    </style>
</head>
<body>

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

<div class="container">
    <div class="box">

        <div class="header">
            <h2>Edit Buku</h2>
        </div>

        <div class="subtitle">
            Mengedit: {{ $book->judul }}
        </div>

<form method="POST" action="/admin/books/{{ $book->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Judul Buku</label>
    <input type="text" name="judul" value="{{ $book->judul }}" required>

    <label>Penulis</label>
    <input type="text" name="penulis" value="{{ $book->penulis }}" required>

    <label>Penerbit</label>
    <input type="text" name="penerbit" value="{{ $book->penerbit }}" required>

    <div class="row">
        <input type="number" name="tahun" value="{{ $book->tahun }}" required>
        <input type="number" name="stok" value="{{ $book->stok }}" required>
    </div>

    <!-- COVER -->
    <label>Cover Saat Ini</label><br>
    <img src="/covers/{{ $book->cover }}" width="80"><br><br>

    <label>Ganti Cover</label>
    <input type="file" name="cover">

    <div class="btn-group">
        <button class="btn-save">Simpan</button>
        <a href="/admin/books" class="btn-back">Kembali</a>
    </div>
</form>

    </div>
</div>

</body>
</html>