<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PesertaPklController;

Route::get('/', function () {
    return redirect()->route('absensi.index');
});

Route::resource('absensi', AbsensiController::class);
Route::get('absensi-laporan', [AbsensiController::class, 'laporan'])->name('absensi.laporan');

Route::resource('peserta-pkl', PesertaPklController::class);
