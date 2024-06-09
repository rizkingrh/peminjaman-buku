<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarUserController;
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
Route::get('/', function () {
    return redirect('login');
});
Route::get('/tesmodal', function () {
    return view('tesmodal');
});

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/daftar-buku', [DashboardController::class, 'daftarBuku']);
Route::get('/peminjaman', [DashboardController::class, 'peminjaman']);
Route::get('/pengembalian', [DashboardController::class, 'pengembalian']);

Route::get('history', [DashboardController::class, 'history']);

Route::resource('daftar-user', DaftarUserController::class);
