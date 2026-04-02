<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

//Route::get('/', function () {
// return view('welcome');
//});

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// ADMIN
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Dashboard Admin";
    });
});

// CRUD Buku
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/books', [BookController::class, 'index']);
    Route::get('/admin/books/create', [BookController::class, 'create']);
    Route::post('/admin/books', [BookController::class, 'store']);
    Route::get('/admin/books/{id}/edit', [BookController::class, 'edit']);
    Route::put('/admin/books/{id}', [BookController::class, 'update']);
    Route::delete('/admin/books/{id}', [BookController::class, 'destroy']);
});

// SISWA
Route::middleware(['role:siswa'])->group(function () {
    Route::get('/user/dashboard', function () {
        return "Dashboard User";
    });
});

// Transaksi Peminjaman dan Pengembalian
    Route::middleware(['role:siswa'])->group(function () {
    Route::get('/user/books', [TransactionController::class, 'index']);
    Route::post('/user/pinjam/{id}', [TransactionController::class, 'pinjam']);
    Route::post('/user/kembali/{id}', [TransactionController::class, 'kembali']);
});

Route::get('/user/transaksi', [TransactionController::class, 'riwayat']);