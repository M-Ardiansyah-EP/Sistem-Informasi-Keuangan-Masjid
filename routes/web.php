<?php

use App\Http\Controllers\BebanController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KontribusiController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\PengajianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QurbanController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZakatController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', RoleMiddleware::class . ':ketua,admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('kas', KasController::class);
    Route::resource('rabs', RabController::class);
    Route::resource('users', UserController::class);

    Route::resource('infaq', InfaqController::class);
    Route::resource('zakat', ZakatController::class);
    Route::resource('qurban', QurbanController::class);
    Route::resource('parkir', ParkirController::class);
    Route::resource('kontribusi', KontribusiController::class);

    Route::resource('beban', BebanController::class);
    Route::resource('pengajian', PengajianController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
