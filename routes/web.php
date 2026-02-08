<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/dashboard');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD & TASK
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [TaskController::class, 'index'])
        ->name('dashboard');

    Route::post('/tasks', [TaskController::class, 'store']);

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| DEVICE ROUTES (ADMIN - BUTUH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ===== LIST & CREATE (HARUS DI ATAS) =====
    Route::get('/devices', [DeviceController::class, 'index'])
        ->name('devices.index');

    Route::get('/devices/create', [DeviceController::class, 'create'])
        ->name('devices.create');

    Route::post('/devices', [DeviceController::class, 'store'])
        ->name('devices.store');

    // ===== QR ROUTES (PAKAI UUID) =====
    Route::get('/devices/qr', [DeviceController::class, 'qrList'])
        ->name('devices.qr.list');

    Route::get('/devices/qr/{device:uuid}', [DeviceController::class, 'qrShow'])
        ->name('devices.qr.show');

    // ===== DETAIL DEVICE (PALING BAWAH, PAKAI UUID) =====
    Route::get('/devices/{device:uuid}', [DeviceController::class, 'show'])
        ->name('devices.show');
});

/*
|--------------------------------------------------------------------------
| DEVICE ROUTE (PUBLIC - HASIL SCAN QR) — PAKAI UUID
|--------------------------------------------------------------------------
*/
Route::get('/public/devices/{device:uuid}', [DeviceController::class, 'publicShow'])
    ->name('devices.public.show');

/*
|--------------------------------------------------------------------------
| PROFILE (Laravel Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
