<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\HomeBackendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

Route::get('/dashboard', [HomeBackendController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('backend-pages');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/', 'welcome')->name('welcome');

//Pegawai

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])->name('pegawai.show');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

//bagian
Route::get('/bagian', [BagianController::class, 'index'])->name('bagian.index');
Route::get('/bagian/create', [BagianController::class, 'create'])->name('bagian.create');
Route::post('/bagian', [BagianController::class, 'store'])->name('bagian.store');
Route::get('/bagian/{bagian}', [BagianController::class, 'show'])->name('bagian.show');
Route::get('/bagian/{bagian}/edit', [BagianController::class, 'edit'])->name('bagian.edit');
Route::put('/bagian/{bagian}', [BagianController::class, 'update'])->name('bagian.update');
Route::delete('/bagian/{bagian}', [BagianController::class, 'destroy'])->name('bagian.destroy');



require __DIR__.'/auth.php';


Route::fallback(function () {
    return redirect()->action([HomeBackendController::class, 'index']);
});
