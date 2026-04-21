<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    // LIST + SEARCH
    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::when($search, function ($query) use ($search) {
            $query->where('judul', 'like', "%$search%")
                  ->orWhere('penulis', 'like', "%$search%");
        })->get();

        return view('user.books', compact('books', 'search'));
    }

    // PINJAM
    public function pinjam($id)
    {
        $book = Book::findOrFail($id);

        $cek = Transaction::where('user_id', Auth::id())
            ->where('book_id', $id)
            ->where('status', 'dipinjam')
            ->first();

        if ($cek) return back()->with('error', 'Sudah meminjam');

        if ($book->stok <= 0) return back()->with('error', 'Stok habis');

        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => now(),
            'tanggal_jatuh_tempo' => now()->addDays(7),
            'status' => 'dipinjam'
        ]);

        $book->decrement('stok');

        return back()->with('success', 'Berhasil pinjam');
    }

    // RIWAYAT USER
    public function riwayat()
    {
        $transactions = Transaction::with('book')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.transaksi', compact('transactions'));
    }

    // PERPANJANG USER
    public function perpanjang($id)
    {
        $t = Transaction::findOrFail($id);

        if ($t->status != 'dipinjam')
            return back()->with('error', 'Tidak bisa diperpanjang');

        if ($t->perpanjangan >= 1)
            return back()->with('error', 'Sudah maksimal');

        if (now()->gt($t->tanggal_jatuh_tempo))
            return back()->with('error', 'Sudah lewat jatuh tempo');

        $t->update([
            'tanggal_jatuh_tempo' => Carbon::parse($t->tanggal_jatuh_tempo)->addDays(7),
            'perpanjangan' => $t->perpanjangan + 1
        ]);

        return back()->with('success', 'Perpanjang berhasil');
    }

    // ADMIN LIST
    public function adminIndex()
    {
        $transactions = Transaction::with('book','user')->get();
        return view('admin.transaksi.index', compact('transactions'));
    }

    // ADMIN KEMBALIKAN
    public function kembaliAdmin($id)
    {
        $t = Transaction::findOrFail($id);

        if ($t->status == 'kembali')
            return back()->with('error', 'Sudah dikembalikan');

        $today = Carbon::now();
        $jatuhTempo = Carbon::parse($t->tanggal_jatuh_tempo);

        $denda = 0;

        if ($today->gt($jatuhTempo)) {
            $hari = $today->diffInDays($jatuhTempo);
            $denda = $hari * 1000;
        }

        $t->update([
            'status' => 'kembali',
            'tanggal_kembali' => $today,
            'denda' => $denda
        ]);

        if ($t->book) {
            $t->book->increment('stok');
        }

        return back()->with('success', 'Dikembalikan. Denda: Rp '.$denda);
    }

    // ADMIN HAPUS
    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status == 'dipinjam') {
            return back()->with('error', 'Tidak bisa hapus, masih dipinjam');
        }

        $transaction->delete();

        return back()->with('success', 'Transaksi dihapus');
    }
}