<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard dengan middleware role
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk Super Admin - Kelola FO
Route::middleware(['auth', 'role:super_admin'])->prefix('fo')->name('fo.')->group(function () {
    Route::get('/', [App\Http\Controllers\FOController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\FOController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\FOController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [App\Http\Controllers\FOController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\FOController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\FOController::class, 'destroy'])->name('destroy');
});

// Route untuk FO & Super Admin - Kelola Anggota
Route::middleware(['auth', 'role:fo,super_admin'])->prefix('anggota')->name('anggota.')->group(function () {
    Route::get('/', [App\Http\Controllers\AnggotaController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\AnggotaController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\AnggotaController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [App\Http\Controllers\AnggotaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\AnggotaController::class, 'update'])->name('update');
    Route::delete('/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy'])->name('destroy');
    Route::get('/export', [App\Http\Controllers\AnggotaController::class, 'export'])->name('export');
});

// ROUTE DEBUG DASHBOARD
Route::get('/debug-dashboard', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    $totalFO = \App\Models\User::where('role', 'fo')->count();
    $totalAnggota = \App\Models\User::where('role', 'anggota')->count();

    return response()->json([
        'user' => $user->name ?? 'NULL',
        'role' => $user->role ?? 'NULL',
        'totalFO' => $totalFO,
        'totalAnggota' => $totalAnggota,
    ]);
})->middleware('auth');

require __DIR__ . '/auth.php';
