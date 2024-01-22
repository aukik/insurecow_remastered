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

    //    ----------------------------------- Company Insurance Middleware Block ---------------------------------------

    Route::middleware('company.without_premium_insurance')->group(function () {

        // ---------------------- bulk insurance view page ----------------------

        Route::get("company_bulk_view_index/{package_id}", [Bulk_insurance_controller::class, 'index'])->name('company.bulk_view_index');
        Route::post("company_bulk_view_index/", [Bulk_insurance_controller::class, 'info_and_cost_calculation'])->name('company.bulk_view_post');

        // ---------------------- bulk insurance view page ----------------------

    });


    //    ---------------------------------- Company Insurance Middleware Block ----------------------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------


