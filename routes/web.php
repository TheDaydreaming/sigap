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
| UMUM & PETUGAS (BUTUH LOGIN SAJA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', [TaskController::class, 'index'])
        ->name('dashboard');

    // Halaman Verifikasi Publik (Hasil Scan QR) - Butuh Login Petugas/Admin
    Route::get('/devices/public/{device:uuid}', [DeviceController::class, 'publicShow'])
        ->name('devices.public.show');

    // Profile (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| KHUSUS ADMINISTRATOR (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', \App\Http\Middleware\AdminOnly::class])->group(function () {
    // ===== TASK SYSTEM =====
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

    // ===== DEVICE MANAGEMENT =====
    Route::get('/devices', [DeviceController::class, 'index'])
        ->name('devices.index');

    Route::get('/devices/create', [DeviceController::class, 'create'])
        ->name('devices.create');

    Route::post('/devices', [DeviceController::class, 'store'])
        ->name('devices.store');

    Route::get('/devices-datatable', [DeviceController::class, 'datatable'])
        ->name('devices.datatable');

    Route::put('/devices/{device}', [DeviceController::class, 'update'])
        ->name('devices.update');

    Route::get('/devices/{device:uuid}/json', [DeviceController::class, 'json'])
        ->name('devices.json');

    Route::get('/devices/qr/download-all', [DeviceController::class, 'downloadAllQr'])
        ->name('devices.qr.download-all');

    Route::get('/devices/qr', [DeviceController::class, 'qrList'])
        ->name('devices.qr.list');

    Route::get('/devices/qr/{device:uuid}', [DeviceController::class, 'qrShow'])
        ->name('devices.qr.show');

    Route::delete('/devices/{id}', [DeviceController::class, 'destroy'])
        ->name('devices.destroy');
});

/*
|--------------------------------------------------------------------------
| SETUP AKUN (HANYA AKTIF SAAT BELUM LOGGED IN / TAMPA USER)
|--------------------------------------------------------------------------
*/
Route::get('/register-first-user-sigap', function () {
    // Inisialisasi/Update Akun Admin
    $admin = \App\Models\User::where('email', 'admin@sigap.id')->first();
    if ($admin) {
        $admin->update(['role' => 'admin']);
    } else {
        $admin = \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@sigap.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
    
    // Inisialisasi Akun Petugas
    $petugas = \App\Models\User::where('email', 'petugas@sigap.id')->first();
    if (!$petugas) {
        $petugas = \App\Models\User::create([
            'name' => 'Petugas Lapas',
            'email' => 'petugas@sigap.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'petugas',
        ]);
    }
    
    return 'Accounts initialized successfully!<br>1. Admin: admin@sigap.id (password123)<br>2. Petugas: petugas@sigap.id (password123)';
});

Route::get('/run-migration-sigap', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migration Output:<br><pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
    } catch (\Throwable $e) {
        return 'Migration Failed: ' . $e->getMessage() . '<br><pre>' . $e->getTraceAsString() . '</pre>';
    }
});

require __DIR__.'/auth.php';
