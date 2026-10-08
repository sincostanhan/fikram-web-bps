<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublikasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publikasi', [PublikasiController::class, 'index'])
    ->name('publikasi.index');

Route::get('/publikasi/create', [PublikasiController::class, 'create'])
    ->name('publikasi.create');

Route::post('/publikasi', [PublikasiController::class, 'store'])
    ->name('publikasi.store');