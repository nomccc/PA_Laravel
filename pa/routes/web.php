<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TempatController;
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

// LOGIN & REGISTER ADMIN
// 1. Login
//menampilkan halaman login
Route::get('/admin', [AuthController::class, 'show'])->name('login');
// memproses data login
Route::post('/login', [AuthController::class, 'login']);
// melakukan logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// 2. Register
//menampilkan halaman tambah akun
Route::get('/tambahAkun', [AdminController::class, 'tambahAkun'])->middleware('auth');
// memproses data register
Route::post('/register', [AuthController::class, 'register']);


// HALAMAN ADMIN
// 1. Dashboard
//menampilkan halaman dashboard (wajib login)
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

// 2. Tempat Makanan
// menampilkan halaman tempat makanan (lihat data) --> blm fix controllernya blm
Route::get('/lihat_tempat', [TempatController::class, 'show'])->middleware('auth');
// menampilkan halaman tambah tempat makanan (create data)
Route::get('/tambah_tempat', [TempatController::class, 'create'])->middleware('auth');

// 3. Menu Makanan
// menampilkan halaman menu makanan (lihat data) --> blm fix controllernya blm
Route::get('lihat_menu', [TempatController::class, 'show'])->middleware('auth');
// menampilkan halaman tambah menu makanan (create data)
Route::get('/tambah_menu', [MenuController::class, 'create'])->middleware('auth');



// HALAMAN USER (BLOM FIX)
Route::get('/', function () {
    return view('layouts.user');
});


