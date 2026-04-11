<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalBuku = Book::count();
        $totalUser = User::where('role', 'siswa')->count();
        $totalTransaksi = Transaction::count();

        $dipinjam = Transaction::where('status', 'dipinjam')->count();
        $dikembalikan = Transaction::where('status', 'kembali')->count();

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalUser',
            'totalTransaksi',
            'dipinjam',
            'dikembalikan'
        ));
    }

public function user()
{
    $dipinjam = \App\Models\Transaction::where('user_id', auth()->id())
        ->where('status', 'dipinjam')
        ->count();

    $dikembalikan = \App\Models\Transaction::where('user_id', auth()->id())
        ->where('status', 'kembali')
        ->count();

    return view('user.dashboard', compact('dipinjam', 'dikembalikan'));
}
}