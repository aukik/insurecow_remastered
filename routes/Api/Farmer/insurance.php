<?php

use App\Http\Controllers\API\Farmer\Insurance\SearchInsurancePackageController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


Route::middleware(['auth:sanctum', 'api.farmer'])->prefix('farmer')->group(function () {

// --------------------------------- Check insurance ---------------------------------

    Route::post('insurance_packages', [SearchInsurancePackageController::class, 'company_insurance_packages_post']);
    Route::post('ttest', [SearchInsurancePackageController::class, 'company_insurance_packages_post']);

//    dd

// --------------------------------- Check insurance ---------------------------------

});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------
