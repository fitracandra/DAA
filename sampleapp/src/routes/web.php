<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
/*Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::prefix('users')->name('users.')->group(function () {
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('update/{user}', [UserController::class, 'update'])->name('update');
});

Route::middleware(['role:administrator'])->group(function () {
    // Routes yang hanya dapat diakses oleh administrator
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    // Menampilkan dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Menampilkan data pengguna
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
});

Route::get('/', function () {
    return view('welcome');
});
