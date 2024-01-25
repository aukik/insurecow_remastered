<?php

use App\Http\Controllers\Company\Bulk_insurance\Bulk_insurance_controller;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPolicyController;
use App\Http\Controllers\Company\PackageController;
use App\Http\Controllers\Company\RegisterFieldAgentController;
use App\Http\Controllers\Company\InsuranceRequest;
use App\Http\Controllers\SuperAdmin\CompanyRequest;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'company'])->prefix('company')->group(function () {

    //    ----------------------------- Company Insurance Middleware Block ----------------------------------

    Route::middleware('company.premium_insurance')->group(function () {

//        Route::post('company_bulk_insurance_acceptance', [Bulk_insurance_controller::class, 'company_insurance_request_acceptance'])->name('company_bulk_insurance_acceptance');


    });


    //    ----------------------------- Company Insurance Middleware Block ----------------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------
