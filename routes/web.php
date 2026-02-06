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
Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/tasks', [TaskController::class, 'store'])
    ->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| DEVICE ROUTES (ADMIN - BUTUH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // CRUD perangkat
    Route::get('/devices', [DeviceController::class, 'index'])
        ->name('devices.index');

    Route::get('/devices/create', [DeviceController::class, 'create'])
        ->name('devices.create');

    Route::post('/devices', [DeviceController::class, 'store'])
        ->name('devices.store');

    Route::get('/devices/{device}', [DeviceController::class, 'show'])
        ->name('devices.show');

    // QR untuk admin (halaman generate)
    Route::get('/devices/qr', [DeviceController::class, 'qrList'])
        ->name('devices.qr.list');

    Route::get('/devices/qr/{device}', [DeviceController::class, 'qrShow'])
        ->name('devices.qr.show');
});

/*
|--------------------------------------------------------------------------
| DEVICE ROUTE (PUBLIC - HASIL SCAN QR)
|--------------------------------------------------------------------------
|
| ➜ Bisa dibuka TANPA LOGIN dari Google Lens / Kamera
|
*/
Route::get('/public/devices/{device}', [DeviceController::class, 'publicShow'])
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
