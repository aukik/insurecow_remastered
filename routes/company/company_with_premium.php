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

    Route::middleware('company.premium_insurance')->group(function () {


        //    ----------------------  Profile Update - Bank and other information update -----------------------

        Route::get("company_transaction_profile",[\App\Http\Controllers\Company\CompanyProfileController::class,'index'])->name('company_corporate_profile');
        Route::put("company_transaction_profile_update",[\App\Http\Controllers\Company\CompanyProfileController::class,'update'])->name('company_corporate_profile_update');

        //    ----------------------  Profile Update - Bank and other information update -----------------------

        //    ----------------------  Company with package will accept or reject request after viewing -----------------------


        Route::get('company_insurance_request_view_with_package_v2/{id}', [\App\Http\Controllers\Company\CashTransactionController::class, 'detailed_view'])->name('company_insurance_detailed_view_with_package_v2');

        //    ----------------------- Company with package will accept or reject request after viewing -----------------------

        //    ----------------------- Company with package - Insurance acceptation or rejection button action [ Post Request ] -----------------------

        Route::get('insurance_request_acceptation_v2/{id}/{acceptance}', [InsuranceRequest::class, 'company_insurance_request_acceptance'])->name("insurance_request_acceptation_v2");

        //    ----------------------- Company with package - Insurance acceptation or rejection button action [ Post Request ] -----------------------

        //    -------------------------- View cattle, package and other Info - Insurance Cash Request - Company with insurance-----------------------------

        Route::get("view_other_info_1/{id}", [InsuranceRequest::class, 'view_other_info_2'])->name('company_other_info_1');

        //    -------------------------- View cattle, package and other Info - Insurance Cash Request - Company with insurance -----------------------------

        //    -------------------------- Package Creation -----------------------------

        Route::resource('package', PackageController::class);

        //    -------------------------- Package Creation -----------------------------

        //    -------------------------- Package Status -----------------------------

        Route::get('package_status/{id}', [CompanyController::class, 'package_status'])->name('package_status');

        //    -------------------------- Package Status -----------------------------

        //    -------------------------- View Insurance requests from farmers and company [Main] -----------------------------

        Route::get("company_insurance_requests", [InsuranceRequest::class, 'view_insurance_history'])->name('company_view_insurance_history');

        //    -------------------------- View Insurance requests from farmers and company [Main] -----------------------------

        //    -------------------------- View Insurance requests from farmers and company [Cash] -----------------------------

//        Route::get("company_insurance_requests_cash", [InsuranceRequest::class, 'view_insurance_history_cash'])->name('company_view_insurance_history_cash');

        //    -------------------------- View Insurance requests from farmers and company [Cash] -----------------------------

        //    -------------------------- Single insurance history page update view - Acceptance or reject [Cash] -----------------------------

        Route::get("company_view_insurance_acceptance_form/{id}", [InsuranceRequest::class, 'view_insurance_acceptance_form'])->name('company_view_insurance_acceptance_form');
        Route::put("company_view_insurance_acceptance_form_update/{id}", [InsuranceRequest::class, 'view_insurance_acceptance_form_update'])->name('company_view_insurance_acceptance_form_update');


        //    -------------------------- Single insurance history page update view - Acceptance or reject [Cash] -----------------------------

        //    ------------------------ Insurance Acceptance or rejection from Insurance company - with package ------------------------

//        Route::get('company_insurance_acceptance/{id}/{acceptance}', [InsuranceRequest::class, 'company_insurance_request_acceptance'])->name('company_insurance_acceptance');
        Route::post('company_insurance_acceptance', [InsuranceRequest::class, 'company_insurance_request_acceptance'])->name('company_insurance_acceptance');

        //    ------------------------ Insurance Acceptance or rejection from Insurance company - with package ------------------------


        //    -------------------------- Send request to farmer -----------------------------

        Route::get("send_request_to_farmer/{id}", [InsuranceRequest::class, 'send_request'])->name('company_send_request');

        //    -------------------------- Send request to farmer -----------------------------

        //    -------------------------- View Cattle Info -----------------------------

        Route::get("view_cattle_info/{id}", [InsuranceRequest::class, 'view_cattle_info'])->name('company_view_cattle_info');

        //    -------------------------- View Cattle Info -----------------------------

        //    ----------------------- Company Transaction History -----------------------

//        Route::get('company_transaction_history_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history'])->name('company.transaction_history_data');
        Route::get('company_transaction_history_with_package_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history_with_package'])->name('company.transaction_history_with_package_data');

        //    ----------------------- Company Transaction History -----------------------
    });


    //    ----------------------------- Company Insurance Middleware Block ----------------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------
