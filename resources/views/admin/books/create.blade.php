<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
<style>
    body {
        background: #F1F5F9;
        font-family: 'Inter', sans-serif;
    }

    .container {
        max-width: 500px;
        margin: 80px auto;
    }

    .box {
        background: white;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #E2E8F0;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 1.4rem;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    input:focus {
        border-color: #1E293B;
        outline: none;
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

    .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 15px;
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

    <div class="box">
        <h2>Tambah Koleksi</h2>

        <form method="POST" action="/admin/books" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul" required>
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" required>
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" required>
            </div>

            <div style="display:flex; gap:10px;">
                <input type="number" name="tahun" placeholder="Tahun" min="0" required>
                <input type="number" name="stok" placeholder="Stok" min="0" required>
            </div>

            <!-- TAMBAHAN COVER -->
            <div class="form-group">
                <label>Cover Buku</label>
                <input type="file" name="cover" required>
            </div>

            <div class="btn-group">
                <button class="btn-save">Simpan</button>
                <a href="/admin/books" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>