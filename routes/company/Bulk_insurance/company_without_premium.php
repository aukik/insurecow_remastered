<?php

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

    Route::middleware('company.without_premium_insurance')->group(function () {


    });


    //    ----------------------------- Company Insurance Middleware Block ----------------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------


