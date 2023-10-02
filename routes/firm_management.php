<?php

use App\Http\Controllers\Farmer\FirmController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------

Route::middleware(['auth', 'farmer'])->prefix('farmer')->group(function () {

    //    ----------------------------- Farm Management Middleware Block ----------------------------------

    Route::middleware('farmer.farm_management')->group(function () {

        // --------------------- Create, view, update block ---------------------

        Route::resource('farm', FirmController::class);

        // --------------------- Create, view, update block ---------------------
    });

    //    ----------------------------- Farm Management Middleware Block ----------------------------------


});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------
