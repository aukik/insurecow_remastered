<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPolicyController;
use App\Http\Controllers\Company\PackageController;
use App\Http\Controllers\Company\RegisterFieldAgentController;
use App\Http\Controllers\Company\InsuranceRequest;
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

        //    -------------------------- View Insurance requests from farmers -----------------------------

        Route::get("company_insurance_requests", [InsuranceRequest::class, 'view_insurance_history'])->name('company_view_insurance_history');

        //    -------------------------- View Insurance requests from farmers -----------------------------

        //    -------------------------- Send request to farmer -----------------------------

        Route::get("send_request_to_farmer/{id}", [InsuranceRequest::class, 'send_request'])->name('company_send_request');

        //    -------------------------- Send request to farmer -----------------------------

        //    -------------------------- View Cattle Info -----------------------------

        Route::get("view_cattle_info/{id}", [InsuranceRequest::class, 'view_cattle_info'])->name('company_view_cattle_info');

        //    -------------------------- View Cattle Info -----------------------------
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
