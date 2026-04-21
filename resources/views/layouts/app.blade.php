<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    <style>
        :root {
            --primary: #1E293B;       /* NAVY */
            --primary-light: #334155;
            --background: #F1F5F9;    /* SOFT GREY */
            --card: #FFFFFF;
            --text: #0F172A;
            --border: #E2E8F0;
            --danger: #DC2626;
        }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--background);
            color: var(--text);
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: var(--primary);
            color: white;
            padding: 25px 18px;
            box-sizing: border-box;
            z-index: 100;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-header {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: center;
            color: white
        }

        .sidebar-header h2 {
            font-size: 1.3rem;
            margin: 0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .sidebar-menu a {
            display: block;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            margin: 6px 0;
            padding: 10px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }

        .sidebar-menu a:hover {
            background: var(--primary-light);
            color: #fff;
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 40px;
            min-height: 100vh;
        }

        /* CARD */
        .card {
            background: var(--card);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        }

        /* LOGOUT BUTTON */
        .btn-logout {
            background: transparent;
            color: rgba(255,255,255,0.8);
            border: 1px solid rgba(255,255,255,0.25);
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: var(--danger);
            border-color: var(--danger);
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">

    <!-- ATAS -->
    <div>
        <div class="sidebar-header">
            <h2>PERPUSTAKAAN</h2>
        </div>

        <div class="sidebar-menu">
            @if(auth()->user()->role == 'admin')
                <a href="/admin/dashboard">Dashboard</a>
                <a href="/admin/books">Kelola Buku</a>
                <a href="/admin/users">Kelola Anggota</a>
                <a href="/admin/transaksi">Transaksi</a>
            @else
                <a href="/user/dashboard">Dashboard</a>
                <a href="/user/books">Pinjam Buku</a>
                <a href="/user/transaksi">Riwayat Pinjam</a>
            @endif
        </div>
    </div>

    <!-- BAWAH -->
    <div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn-logout">Keluar</button>
        </form>
    </div>

</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>