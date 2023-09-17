<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

// -------------------------------------------------------------------- Super Admin - dashboard --------------------------------------------------------------------


Route::middleware(['auth', 'super.admin'])->prefix('superAdmin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'super_admin'])->name('sp.dashboard');

});

// -------------------------------------------------------------------- Super Admin - dashboard --------------------------------------------------------------------

// -------------------------------------------------------------------- company - dashboard --------------------------------------------------------------------


Route::middleware(['auth', 'company'])->prefix('company')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'company'])->name('c.dashboard');

});

// -------------------------------------------------------------------- company - dashboard --------------------------------------------------------------------

// -------------------------------------------------------------------- Farmer - dashboard --------------------------------------------------------------------


Route::middleware(['auth', 'farmer'])->prefix('farmer')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'farmer'])->name('f.dashboard');

});

// -------------------------------------------------------------------- Farmer - dashboard --------------------------------------------------------------------
