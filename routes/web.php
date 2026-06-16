<?php

use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LayananController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (Untuk Customer Umum)
|--------------------------------------------------------------------------
*/

// Halaman utama pertama kali web dibuka (Welcome Page)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Jalur Tampilan Login & Register Customer
Route::get('/login', function () {
    return view('frontend.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('frontend.auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'loginCustomer'])->name('login.store');

Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/register-sukses', function () {
    return view('frontend.auth.success');
})->name('register.success');


/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (Khusus Customer yang SUDAH LOGIN)
|--------------------------------------------------------------------------
| Semua route di dalam grup middleware ini wajib login terlebih dahulu.
*/
Route::middleware(['auth'])->group(function () {

    // Halaman Transisi Sukses Register (After Register Page)
    Route::get('/register-sukses', function () {
        return view('frontend.auth.success');
    })->name('register.success');

    // Halaman Utama Customer (Page Beranda & Tempat Booking)
    Route::get('/beranda', function () {
        return view('frontend.beranda');
    })->name('customer.beranda');

    // Tempat menaruh route frontend diproteksi lainnya nanti (Tentang Kami, Setting, dll)

});


/*
|--------------------------------------------------------------------------
| BACKEND ROUTES (Untuk Admin / Barber)
|--------------------------------------------------------------------------
| Semua route di dalam grup ini otomatis awalan URL-nya wajib pakai 'backend/...'
*/
Route::prefix('backend')->group(function () {

    // Login khusus admin -> ketik di browser: localhost:8000/backend/login
    Route::get('/login', [AuthController::class, 'login'])->name('backend.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('backend.auth');

    // Dashboard Utama Admin -> ketik di browser: localhost:8000/backend/dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

    // Manajemen Data User / Pengguna
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    // Manajemen Layanan & Profil Admin
    Route::resource('layanan', LayananController::class);
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');

});