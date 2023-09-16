<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPolicyController;
use App\Http\Controllers\Company\PackageController;
use App\Http\Controllers\Company\RegisterFieldAgentController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'company'])->prefix('company')->group(function () {
    Route::get('test', function () {
        return "Company";
    });


    //    ----------------------------- Register Field Agent Middleware Block ----------------------------------


    Route::middleware('company.register_agent')->group(function () {

        //    -------------------------- Register Field Agent -----------------------------

        Route::resource('farmer_register', RegisterFieldAgentController::class);

        //    -------------------------- Register Field Agent -----------------------------

        //    -------------------------- Registered Farmer / Agents -----------------------------

        Route::get('registered', [CompanyController::class, 'registered_farmers'])->name('company.farmer_registered');

        //    -------------------------- Registered Farmer / Agents -----------------------------

    });

    //    ----------------------------- Register Field Agent Middleware Block ----------------------------------


//    -------------------------- Policy Creation -----------------------------

    Route::resource('policy', CompanyPolicyController::class);

//    -------------------------- Policy Creation -----------------------------

    //    ----------------------------- Company Insurance Middleware Block ----------------------------------

    Route::middleware('company.premium_insurance')->group(function () {

        //    -------------------------- Package Creation -----------------------------

        Route::resource('package', PackageController::class);

        //    -------------------------- Package Creation -----------------------------

        //    -------------------------- Package Status -----------------------------

        Route::get('package_status/{id}', [CompanyController::class, 'package_status'])->name('package_status');

        //    -------------------------- Package Status -----------------------------
    });


    //    ----------------------------- Company Insurance Middleware Block ----------------------------------


    //    ----------------------------- Registered Resources -----------------------------

    Route::get("registered_cattle/{id}", [CompanyController::class, "cattle_list"])->name("cm.registered_cattle");


//    ----------------------------- Registered Resources -----------------------------


});


//Route::get('tt', function () {
//    if (auth()->user()->permission->c_register_agent) {
//        return "true";
//    } else {
//        return "false";
//    }
//});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------
