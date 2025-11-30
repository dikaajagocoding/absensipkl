<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeralatanController;

Route::get('/', function () {
    return redirect()->route('peminjaman.index');
});

Route::resource('peminjaman', PeminjamanController::class);
Route::get('peminjaman-laporan', [PeminjamanController::class, 'laporan'])->name('peminjaman.laporan');

Route::resource('peralatan', PeralatanController::class);

