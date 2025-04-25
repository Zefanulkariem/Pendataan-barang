<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MerkController;

Route::get('/', function () {
    return view('home.dashboard');
});

Route::resource('barang', BarangController::class);
Route::resource('merk', MerkController::class);
