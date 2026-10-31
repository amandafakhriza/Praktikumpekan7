<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('laporans.create');
});

// Form pelaporan: terbuka untuk warga (tanpa login)
Route::resource('laporans', LaporanController::class)->only(['create', 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pengelolaan laporan: hanya petugas yang sudah login
    Route::resource('laporans', LaporanController::class)->except(['create', 'store']);
});

require __DIR__.'/auth.php';