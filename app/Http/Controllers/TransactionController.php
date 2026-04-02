<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // LIST BUKU
    public function index()
    {
        $books = Book::all();
        return view('user.books', compact('books'));
    }

    // PINJAM BUKU
    public function pinjam($id)
    {
        $book = Book::findOrFail($id);

        // CEK SUDAH DIPINJAM
        $cek = Transaction::where('user_id', Auth::id())
            ->where('book_id', $id)
            ->where('status', 'dipinjam')
            ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah meminjam buku ini');
        }

        // CEK STOK
        if ($book->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        // SIMPAN
        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam'
        ]);

        // KURANGI STOK
        $book->decrement('stok');

        return back()->with('success', 'Buku berhasil dipinjam');
    }

    // RIWAYAT
    public function riwayat()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.transaksi', compact('transactions'));
    }

    // KEMBALI
    public function kembali($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status == 'kembali') {
            return back()->with('error', 'Buku sudah dikembalikan');
        }

        // UPDATE
        $transaction->update([
            'status' => 'kembali',
            'tanggal_kembali' => now()
        ]);

        // TAMBAH STOK
        if ($transaction->book) {
            $transaction->book->increment('stok');
        }

        return back()->with('success', 'Buku berhasil dikembalikan');
    }
}