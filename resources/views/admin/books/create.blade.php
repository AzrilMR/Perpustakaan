<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Cozy Library</title>
    <style>
        body {
            /* Background: Cream (#FEFBF3) */
            background-color: #FEFBF3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #2D4263;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .box {
            /* Accent Box: Beige (#ECDBBA) */
            background-color: #ECDBBA;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #2D4263;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #D4C4A8;
            border-radius: 8px;
            box-sizing: border-box;
            background-color: #FEFBF3;
            color: #2D4263;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        input:focus {
            outline: none;
            border: 2px solid #2D4263;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        /* Simpan Button: Terracotta (#C84B31) */
        .btn-save {
            background-color: #C84B31;
            color: #FEFBF3;
        }

        .btn-save:hover {
            background-color: #A93E28;
            transform: translateY(-2px);
        }

        /* Kembali Button: Forest Green Outline */
        .btn-back {
            background-color: transparent;
            color: #2D4263;
            border: 2px solid #2D4263;
        }

        .btn-back:hover {
            background-color: #2D4263;
            color: #FEFBF3;
        }

        /* Alerts */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">✔️ {{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">❌ {{ session('error') }}</div>
    @endif

    <div class="box">
        <h2>Tambah Koleksi</h2>

        <form method="POST" action="/admin/books">
            @csrf

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul" placeholder="Masukkan judul buku" required>
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" placeholder="Nama penulis" required>
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" placeholder="Nama penerbit" required>
            </div>

            <div style="display: flex; gap: 15px;">
                <div class="form-group" style="flex: 1;">
                    <label>Tahun</label>
                    <input type="number" name="tahun" placeholder="Contoh: 2023" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Stok</label>
                    <input type="number" name="stok" placeholder="Jumlah" required>
                </div>
            </div>

            <div class="btn-group">
                <a href="/admin/books" class="btn btn-back">Batal</a>
                <button type="submit" class="btn btn-save">Simpan Buku</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>