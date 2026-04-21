<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing'); // resources/views/landing.blade.php
})->name('landing');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['role:admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // BOOKS
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{id}/edit', [BookController::class, 'edit']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

    // USERS
    Route::get('/users', [AuthController::class, 'users']);
    Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);

    // TRANSAKSI
    Route::get('/transaksi', [TransactionController::class, 'adminIndex']);
    Route::delete('/transaksi/{id}', [TransactionController::class, 'delete']);

    // KEMBALI
    Route::post('/transaksi/kembali/{id}', [TransactionController::class, 'kembaliAdmin']);
});


/*
|--------------------------------------------------------------------------
| USER / SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['role:siswa'])->prefix('user')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    // Buku
    Route::get('/books', [TransactionController::class, 'index']);
    Route::post('/pinjam/{id}', [TransactionController::class, 'pinjam']);

    // Transaksi
    Route::get('/transaksi', [TransactionController::class, 'riwayat']);
    Route::post('/perpanjang/{id}', [TransactionController::class, 'perpanjang']);
});