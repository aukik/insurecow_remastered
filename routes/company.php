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

    //    ----------------------------- Company permission provided to farmers  -----------------------------

    Route::resource("company_permission", \App\Http\Controllers\CompanyPermissionController::class);

//    ----------------------------- Company permission provided to farmers -----------------------------

    //    ----------------------------- History -----------------------------

    Route::get("company_history", [CompanyRequest::class, "company_history"])->name("cp.user_history");

//    ----------------------------- History -----------------------------


    //    ----------------------------- Register Field Agent Middleware Block ----------------------------------


    Route::middleware('company.register_agent')->group(function () {

        //    -------------------------- Register Field Agent -----------------------------

        Route::resource('farmer_register', RegisterFieldAgentController::class);

        //    -------------------------- Register Field Agent -----------------------------

        //    -------------------------- Registered Farmer / Agents -----------------------------

//        Route::get('registered', [CompanyController::class, 'registered_farmers'])->name('company.farmer_registered');

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

        //    ----------------------- Company Transaction History -----------------------

//        Route::get('company_transaction_history_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history'])->name('company.transaction_history_data');
        Route::get('company_transaction_history_with_package_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history_with_package'])->name('company.transaction_history_with_package_data');

        //    ----------------------- Company Transaction History -----------------------
    });


    //    ----------------------------- Company Insurance Middleware Block ----------------------------------


    //    ----------------------------- Registered Resources -----------------------------

    Route::get("registered_cattle/{id}", [CompanyController::class, "cattle_list"])->name("cm.registered_cattle");


    //    ----------------------------- Registered Resources -----------------------------

    //    ----------------------------- Registered Resources -----------------------------

    Route::get("company_all_registered_farmers/", [CompanyRequest::class, "all_farmers"])->name("cp.all_registered_farmers");


    //    ----------------------------- Registered Resources -----------------------------


    //    ----------------------------- registered animal page view under farmer ID -----------------------------


    Route::get("registered_cattle_company/{id}", [\App\Http\Controllers\Company\Farmer\RegisteredResourceController::class, "cattle_list"])->name("cp.registered_cattle");

    //    ----------------------------- creating animal page view under farmer ID -----------------------------

    //    ----------------------------- Animal detailed view with Animal ID -----------------------------

    Route::get('cattle_list_single_company/{id}', [\App\Http\Controllers\Company\Farmer\RegisteredResourceController::class, 'view_registered_cattle_single'])->name('cp.cattle.list.single');

    //    ----------------------------- Animal detailed view with Animal ID -----------------------------


    Route::middleware('company.cattle_reg_and_claim')->group(function () {


        //    ----------------------------- register an animal page view and store method -----------------------------

        Route::get('register_cattle_from_company_side/{id}', [\App\Http\Controllers\Company\Farmer\FarmerController::class, 'index'])->name('register_cattle_from_company_side');
        Route::post('register_cattle_from_company_side/', [\App\Http\Controllers\Company\Farmer\FarmerController::class, 'store'])->name('register_cattle_from_company_side.store');

        //    ----------------------------- register an animal page view and store method -----------------------------

        //    ----------------------- Claim Insurance -----------------------

        Route::get("company_admin_claim_insurance_test/{id}", [\App\Http\Controllers\Company\Farmer\ClaimController::class, 'index'])->name('cp.claim.index');
        Route::post("cp_admin_claim_insurance_test", [\App\Http\Controllers\Company\Farmer\ClaimController::class, 'store'])->name('cp.claim.store');

        //    ----------------------- Claim Insurance -----------------------


    });

//    ------------------------------------------------------------------------------------------------ Company will be able to insurance farmers ---------------------------------------------------------------------------------------

    Route::middleware('company.without_premium_insurance')->group(function () {


        //    -------------------------- View Cattle Info -----------------------------

        Route::get("view_cattle_info_2/{id}", [InsuranceRequest::class, 'view_cattle_info'])->name('company_view_cattle_info_2');

        //    -------------------------- View Cattle Info -----------------------------

        Route::get('search_company', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'search_company'])->name('company.insurance_search_get');
        Route::get('search_company_post', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'total_insurance_packages'])->name('company.insurance_search_post');


//    ------------------------------------------ Single package result view from packages ------------------------------------------

        Route::get('single_package_result_view/{package}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'single_package_result_view'])->name('company.single_package_result_view');


//    ------------------------------------------ Single package result view from packages ------------------------------------------

//    ------------------------------------------ Single animal select for insurance by company ------------------------------------------

        Route::get('single_animal_insurance_package_form/{package}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'single_animal_select'])->name('company.single_animal_select_package');


//    ------------------------------------------ Single animal select for insurance by company ------------------------------------------

//    ------------------------------------------ farmers cattle list filter from company side ------------------------------------------

        Route::get('farmers_cattle_list_filter/{cattle_info}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'animal_list_filter'])->name('company.animal_list_filter');

//    ------------------------------------------ farmers cattle list filter from company side ------------------------------------------


//    ------------------------------------------ Insurance calculation for the animal ------------------------------------------

        Route::get('farmer_insurance_calculation/{cattle_info}/{package_info}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_calculation'])->name('company.insurance_calculation_for_animal');

//    ------------------------------------------ Insurance calculation for the animal ------------------------------------------

//    ------------------------------------------ requesting for the animal for insurance from company side ------------------------------------------

        Route::post('insurance_request_sent_from_company', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'request_for_insurance'])->name('company.insurance_request_sent_from_company');

//    ------------------------------------------ requesting for the animal for insurance from company side ------------------------------------------

        //    ----------------------- Company insurance requests -----------------------

        Route::get('company_insurance_requests_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'view_insurance_history'])->name('company.view_insurance_history');

        //    ----------------------- Company insurance requests -----------------------

        //    ----------------------- Company Transaction History -----------------------

        Route::get('company_transaction_history_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history'])->name('company.transaction_history_data');

        //    ----------------------- Company Transaction History -----------------------

    });

//    --------------------------------------------------------------------------------------------------- Company will be able to insurance farmers --------------------------------------------------------------------------------------------

});

// -------------------------------------------------------------------- Payment Gateway --------------------------------------------------------------------

Route::post('/company_pay', [\App\Http\Controllers\CompanySslCommerzPaymentController::class, 'index'])->name("company_pay");
Route::post('/company_pay-via-ajax', [\App\Http\Controllers\CompanySslCommerzPaymentController::class, 'payViaAjax']);

// -------------------------------------------------------------------- Payment Gateway --------------------------------------------------------------------


// -------------------------------------------------------------------- Company --------------------------------------------------------------------

