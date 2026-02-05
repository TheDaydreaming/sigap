<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('/dashboard');
});

/* ========== DASHBOARD ========== */
Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/tasks', [TaskController::class, 'store'])
    ->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->middleware('auth');

/* ========== DEVICE ROUTES ========== */
Route::get('/devices/qr', [DeviceController::class, 'qrList'])
    ->middleware('auth')->name('devices.qr.list');

Route::get('/devices/qr/{device}', [DeviceController::class, 'qrShow'])
    ->middleware('auth')->name('devices.qr.show');

Route::get('/devices/create', [DeviceController::class, 'create'])
    ->middleware('auth')
    ->name('devices.create');

Route::post('/devices', [DeviceController::class, 'store'])
    ->middleware('auth')
    ->name('devices.store');

Route::get('/devices', [DeviceController::class, 'index'])
    ->middleware('auth')
    ->name('devices.index');

/* PALING BAWAH */
Route::get('/devices/{device}', [DeviceController::class, 'show'])
    ->middleware('auth')
    ->name('devices.show');

/* ========== PROFILE (BREEZE) ========== */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
