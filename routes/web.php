<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Login
Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');


#Home
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

#Register
Route::resource('register', RegisterController::class)->middleware(['auth', 'admin']);

#Barang
Route::resource('barang', BarangController::class)->middleware(['auth']);