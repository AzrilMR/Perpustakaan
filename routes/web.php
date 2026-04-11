<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

//Route::get('/', function () {
// return view('welcome');
//});

// LOGIN
Route::get('/', [AuthController::class, 'showLogin']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


// ADMIN
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin']);

    Route::get('/admin/books', [BookController::class, 'index']);
    Route::get('/admin/books/create', [BookController::class, 'create']);
    Route::post('/admin/books', [BookController::class, 'store']);
    Route::get('/admin/books/{id}/edit', [BookController::class, 'edit']);
    Route::put('/admin/books/{id}', [BookController::class, 'update']);
    Route::delete('/admin/books/{id}', [BookController::class, 'destroy']);
    Route::get('/admin/users', [AuthController::class, 'users']);
    Route::get('/admin/transaksi', [TransactionController::class, 'adminIndex'])
    ->middleware('role:admin');
    Route::delete('/admin/users/{id}', [AuthController::class, 'deleteUser'])
    ->middleware('role:admin');
    Route::delete('/admin/transaksi/{id}', [TransactionController::class, 'delete'])
    ->middleware('role:admin');
});


// SISWA
Route::middleware(['role:siswa'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'user']);

    Route::get('/user/books', [TransactionController::class, 'index']);
    Route::post('/user/pinjam/{id}', [TransactionController::class, 'pinjam']);
    Route::post('/user/kembali/{id}', [TransactionController::class, 'kembali']);
    
    Route::get('/user/transaksi', [TransactionController::class, 'riwayat']);
});