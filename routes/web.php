<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('testing');
});

Route::get('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/daftar-user', [DashboardController::class, 'daftarUser']);
Route::get('/daftar-buku', [DashboardController::class, 'daftarBuku']);
Route::get('/peminjaman', [DashboardController::class, 'peminjaman']);
Route::get('/pengembalian', [DashboardController::class, 'pengembalian']);
