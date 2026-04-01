<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin']);
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

// SISWA
Route::middleware(['role:siswa'])->group(function () {
    Route::get('/user/dashboard', function () {
        return "Dashboard User";
    });
});
