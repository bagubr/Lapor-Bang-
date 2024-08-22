<?php

use App\Http\Controllers\FotoKerusakanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspeksiController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\PermohonanController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

App::setLocale('id');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/pemohon', [PemohonController::class, 'index'])->name('pemohon');
Route::middleware(['auth'])->group(function () {
    Route::resource('/pemohon', PemohonController::class);
    Route::resource('/inspektor', InspeksiController::class);
    Route::get('/permohonan/kelurahan', [PermohonanController::class, 'kelurahan'])->name('permohonan.kelurahan');
    Route::get('/permohonan/kecamatan', [PermohonanController::class, 'kecamatan'])->name('permohonan.kecamatan');
    Route::get('/inspeksi', [PermohonanController::class, 'inspeksi'])->name('permohonan.ispeksi');
    Route::get('/selesai_inspeksi', [PermohonanController::class, 'selesai_inspeksi'])->name('permohonan.selesai_inspeksi');
    Route::get('/accept', [PermohonanController::class, 'accept'])->name('permohonan.accept');
    Route::get('/proses', [PermohonanController::class, 'proses'])->name('permohonan.proses');
    Route::get('/decline', [PermohonanController::class, 'decline'])->name('permohonan.decline');
    Route::post('/kirim/{permohonan}', [PermohonanController::class, 'kirim'])->name('kirim');
    Route::resource('/permohonan', PermohonanController::class);
    Route::delete('/foto_kerusakan/{foto_kerusakan}', [FotoKerusakanController::class, 'destroy'])->name('foto_kerusakan.destroy');
    Route::post('/foto_kerusakan/{inspeksi}', [FotoKerusakanController::class, 'foto_inspeksi'])->name('foto_kerusakan.inspeksi');
});
