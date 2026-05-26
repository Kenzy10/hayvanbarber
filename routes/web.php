<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

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
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'authenticate']);

Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
});