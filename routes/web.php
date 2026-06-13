<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LayananController;
use App\Http\Controllers\Backend\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'authenticate']);

Route::get('/dashboard', [DashboardController::class, 'index']);

// Data User Routes
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');


Route::resource('layanan', LayananController::class);