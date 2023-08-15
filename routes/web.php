<?php

use App\Http\Controllers\Farmer\CattleRegistrationController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\Farmer\FarmerProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view("front.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------------------------------------------- Logout --------------------------------------------------------------------


Route::middleware('auth')->group(function () {
    Route::get('log_out', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('log_out');
});


// -------------------------------------------------------------------- Logout --------------------------------------------------------------------




// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


Route::middleware(['auth', 'farmer'])->prefix('farmer')->group(function () {

//    ----------------------------- Dashboard -----------------------------

    Route::get('dashboard', [FarmerController::class, 'index']);

//    ----------------------------- Dashboard -----------------------------

//    -------------------------- Farmer Profile -----------------------------

    Route::resource('farmer_profile', FarmerProfileController::class);

//    -------------------------- Farmer Profile -----------------------------

    //    -------------------------- Cattle Registration -----------------------------

    Route::resource('cattle_register', CattleRegistrationController::class);

//    -------------------------- Cattle Registration -----------------------------

//    -------------------------- Cattle Registration -----------------------------

//    -------------------------- view registered cattle -----------------------------

    Route::get('cattle_list', [FarmerController::class, 'view_registered_cattle'])->name('cattle.list');

//    -------------------------- view registered cattle -----------------------------


});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


