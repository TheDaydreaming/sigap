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

    // ===== LIST & CREATE =====
    Route::get('/devices', [DeviceController::class, 'index'])
        ->name('devices.index');

    Route::get('/devices/create', [DeviceController::class, 'create'])
        ->name('devices.create');

    Route::post('/devices', [DeviceController::class, 'store'])
        ->name('devices.store');

    // ===== DATA UNTUK DATATABLES (AJAX) =====
    Route::get('/devices-datatable', [DeviceController::class, 'datatable'])
        ->name('devices.datatable');

    // ===== UPDATE (EDIT DARI MODAL) =====
    Route::put('/devices/{device}', [DeviceController::class, 'update'])
        ->name('devices.update');

    // ===== JSON UNTUK MODAL (DETAIL & EDIT) — pakai UUID =====
    Route::get('/devices/{device:uuid}/json', [DeviceController::class, 'json'])
        ->name('devices.json');

    // ===== QR ROUTES (PAKAI UUID) =====
    Route::get('/devices/qr', [DeviceController::class, 'qrList'])
        ->name('devices.qr.list');

    Route::get('/devices/qr/{device:uuid}', [DeviceController::class, 'qrShow'])
        ->name('devices.qr.show');

    // ===== DELETE (AJAX) =====
    Route::delete('/devices/{id}', [DeviceController::class, 'destroy'])
        ->name('devices.destroy');
});

/*
|--------------------------------------------------------------------------
| DEVICE ROUTE (PUBLIC - HASIL SCAN QR)
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
