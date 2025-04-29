<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/', HomeController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('merk', MerkController::class);
});
