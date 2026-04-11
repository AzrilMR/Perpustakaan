<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FEFBF3;
            color: #2D4263;
        }

        /* SIDEBAR TETAP */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: #2D4263; /* Forest Green */
            color: #FEFBF3;
            padding: 30px 20px;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            box-sizing: border-box;
            z-index: 100;
        }

        /* TULISAN PERPUSTAKAAN (Header Sidebar) */
        .sidebar-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            color: #FEFBF3;
            margin: 0;
            padding-bottom: 15px;
            border-bottom: 2px solid #ECDBBA; /* Garis bawah krem */
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu a {
            display: block;
            color: #ECDBBA;
            text-decoration: none;
            margin: 10px 0;
            padding: 12px 15px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: #ECDBBA;
            color: #2D4263;
        }

        .card {
         background: #ECDBBA;
         padding: 20px;
         margin-bottom: 20px;
         border-radius: 12px;
         color: #2D4263;
         box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        /* KONTEN DINAMIS */
        .content {
            margin-left: 240px;
            padding: 40px;
            min-height: 100vh;
        }

        .btn-logout {
            background: transparent;
            color: #ECDBBA;
            border: 1px solid #ECDBBA;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 50px;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #C84B31; /* Terracotta */
            border-color: #C84B31;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>Perpustakaan</h2> </div>

    <div class="sidebar-menu">
        @if(auth()->user()->role == 'admin')
            <a href="/admin/dashboard">🏠 Dashboard</a>
            <a href="/admin/books">📚 Kelola Buku</a>
            <a href="/admin/users">👥 Kelola Anggota</a>
            <a href="/admin/transaksi">📑 Transaksi</a>
        @else
            <a href="/user/dashboard">🏠 Dashboard</a>
            <a href="/user/books">📖 Pinjam Buku</a>
            <a href="/user/transaksi">⏳ Riwayat Pinjam</a>
        @endif

        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn-logout">Keluar</button>
        </form>
    </div>
</div>

<div class="content">
    @yield('content') </div>

</body>
</html>