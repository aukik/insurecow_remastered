<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Farm_management\AnimalInformationController;
use App\Http\Controllers\Farm_management\FeedingAndNutritionController;
use App\Http\Controllers\Farm_management\ReproductionAndBreedingController;
use App\Http\Controllers\Farmer\FirmController;
use App\Models\Farm_management\ReproductionAndBreeding;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------

Route::middleware(['auth', 'farmer'])->prefix('farmer/farm_management')->group(function () {

    //    ----------------------------- Farm Management Middleware Block ----------------------------------

    Route::middleware('farmer.farm_management')->group(function () {

        // --------------------- Create and view farms ---------------------

        Route::resource('farm', FirmController::class);

        // --------------------- Create, and view farms ---------------------

        // --------------------- farm management dashboard ---------------------

        Route::get('dashboard', [DashboardController::class, 'farm_management'])->name('fm_dashboard');

        // --------------------- farm management dashboard ---------------------

        // --------------------- Animal Information ---------------------

        Route::resource('animal_information', AnimalInformationController::class);

        // --------------------- Animal Information ---------------------

        // --------------------- Feeding and nutrition ---------------------

        Route::resource('feeding_and_nutrition', FeedingAndNutritionController::class);

        // --------------------- Feeding and nutrition ---------------------

        // --------------------- Reproduction and Breeding ---------------------

        Route::resource('reproduction_and_breeding', ReproductionAndBreedingController::class);

        // --------------------- Reproduction and Breeding ---------------------
    });

    //    ----------------------------- Farm Management Middleware Block ----------------------------------


});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


// -------------------------------------------------------------------- Farmer - From Super Admin Side --------------------------------------------------------------------

Route::middleware(['auth', 'super.admin'])->prefix('superAdmin')->group(function () {


    Route::resource('farm_super_admin', \App\Http\Controllers\SuperAdmin\Farmer\FarmController::class);


});

// -------------------------------------------------------------------- Farmer - From Super Admin Side --------------------------------------------------------------------
