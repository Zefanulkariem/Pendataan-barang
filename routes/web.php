<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard route, protected by auth middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('merk', MerkController::class)->middleware('auth');
Route::resource('jenis', JenisController::class)->middleware('auth');
