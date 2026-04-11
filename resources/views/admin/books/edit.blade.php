<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Cozy Library</title>
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
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        .subtitle {
            text-align: center;
            display: block;
            margin-bottom: 30px;
            font-size: 0.9rem;
            opacity: 0.8;
            font-style: italic;
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
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border: 2px solid #2D4263;
            background-color: #fff;
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

        /* Update Button: Terracotta (#C84B31) */
        .btn-update {
            background-color: #C84B31;
            color: #FEFBF3;
        }

        .btn-update:hover {
            background-color: #A93E28;
            transform: translateY(-2px);
        }

        /* Batal Button: Forest Green Outline */
        .btn-cancel {
            background-color: transparent;
            color: #2D4263;
            border: 2px solid #2D4263;
        }

        .btn-cancel:hover {
            background-color: #2D4263;
            color: #FEFBF3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Edit Koleksi</h2>
        <span class="subtitle">Memperbarui data: {{ $book->judul }}</span>

        <form method="POST" action="/admin/books/{{ $book->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul" value="{{ $book->judul }}" required>
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" value="{{ $book->penulis }}" required>
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="{{ $book->penerbit }}" required>
            </div>

            <div style="display: flex; gap: 15px;">
                <div class="form-group" style="flex: 1;">
                    <label>Tahun</label>
                    <input type="number" name="tahun" value="{{ $book->tahun }}" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Stok</label>
                    <input type="number" name="stok" value="{{ $book->stok }}" required>
                </div>
            </div>

            <div class="btn-group">
                <a href="/admin/books" class="btn btn-cancel">Batal</a>
                <button type="submit" class="btn btn-update">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>