<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPolicyController;
use App\Http\Controllers\Company\PackageController;
use App\Http\Controllers\Company\RegisterFieldAgentController;
use App\Http\Controllers\Company\InsuranceRequest;
use App\Http\Controllers\InsuredController;
use App\Http\Controllers\SuperAdmin\CompanyRequest;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'company'])->prefix('company')->group(function () {

    //    ------------------------------------------------------------------------------------------------ Company will be able to insurance farmers ---------------------------------------------------------------------------------------

    Route::middleware('company.without_premium_insurance')->group(function () {


        //    -------------------------- Insured Cattle List -----------------------------

        Route::get('insured_animal_list_2', [\App\Http\Controllers\InsuredController::class,'insured'])->name('company_insured_animal_list_2');

        //    -------------------------- Insured Cattle List -----------------------------

        //    -------------------------- Pending Insurance Request Data -----------------------------

        Route::get('company_pending_insurance_requests_data', [InsuredController::class, 'view_pending_insurance_history'])->name('company.view_pending_insurance_history');

        //    -------------------------- Pending Insurance Request Data -----------------------------

        //    -------------------------- View Cattle Info -----------------------------

        Route::get("view_cattle_info_2/{id}", [InsuranceRequest::class, 'view_cattle_info'])->name('company_view_cattle_info_2');

        //    -------------------------- View Cattle Info -----------------------------

        //    -------------------------- View cattle, package and other Info - Insurance Cash Request -----------------------------

        Route::get("view_other_info_2/{id}", [InsuranceRequest::class, 'view_other_info'])->name('company_other_info_2');

        //    -------------------------- View cattle, package and other Info - Insurance Cash Request -----------------------------

        //    -------------------------- Search company for insurance -----------------------------

        Route::get('search_company', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'search_company'])->name('company.insurance_search_get');
        Route::get('search_company_post', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'total_insurance_packages'])->name('company.insurance_search_post');

        //    -------------------------- Search company for insurance -----------------------------

//    ------------------------------------------ Single package result view from packages ------------------------------------------

        Route::get('single_package_result_view/{package}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'single_package_result_view'])->name('company.single_package_result_view');


//    ------------------------------------------ Single package result view from packages ------------------------------------------

//    ------------------------------------------------------------ Single animal select for insurance by company [For digital payment] --------------------------------------------------------------------

        Route::get('single_animal_insurance_package_form/{package}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'single_animal_select'])->name('company.single_animal_select_package');


//    ------------------------------------------------------------- Single animal select for insurance by company [For digital payment] --------------------------------------------------------------------

//    ------------------------------------------------------------- Single animal select for insurance by company [For cash payment] --------------------------------------------------------------------

        Route::get('single_animal_insurance_package_form_cash/{package}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'single_animal_select_cash'])->name('company.single_animal_select_package_cash');


//    ------------------------------------------------------------- Single animal select for insurance by company [For cash payment] --------------------------------------------------------------------

//    ------------------------------------------ farmers cattle list filter from company side ------------------------------------------

        Route::get('farmers_cattle_list_filter/{cattle_info}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'animal_list_filter'])->name('company.animal_list_filter');

//    ------------------------------------------ farmers cattle list filter from company side ------------------------------------------


//    ------------------------------------------ Insurance calculation for the animal ------------------------------------------

        Route::get('farmer_insurance_calculation/{cattle_info}/{package_info}', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_calculation'])->name('company.insurance_calculation_for_animal');

//    ------------------------------------------ Insurance calculation for the animal ------------------------------------------

//    ------------------------------------------ requesting for the animal for insurance from company side [Digital] ------------------------------------------

        Route::post('insurance_request_sent_from_company', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'request_for_insurance'])->name('company.insurance_request_sent_from_company');

//    ------------------------------------------ requesting for the animal for insurance from company side [Digital] ------------------------------------------

//    ------------------------------------------ requesting for the animal for insurance from company side [Cash] ------------------------------------------

        Route::post('insurance_request_sent_from_company_cash', [\App\Http\Controllers\Company\Farmer\InsuranceCashRequestController::class, 'request_for_insurance_cash'])->name('company.insurance_request_sent_from_company_cash');


//    ------------------------------------------ requesting for the animal for insurance from company side [Cash] ------------------------------------------

        //    ----------------------- Company insurance requests - Insurance Requested Company [ Digital Transaction Requests ] -----------------------

        Route::get('company_insurance_requests_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'view_insurance_history'])->name('company.view_insurance_history');

        //    ----------------------- Company insurance requests - Insurance Requested Company [ Digital Transaction Requests ] -----------------------

        //    ---------------------------------------------------------------------------------------------------------------- Cart Page view - Company without insurance page -----------------------------------------------------------------------------------------------------------------------

        Route::get('company_without_insurance_cart/{id}', [\App\Http\Controllers\Company\CartController::class, 'cart'])->name('company_without_insurance_cart');

        //    ----------------------- Transaction view -----------------------

        Route::get('company_insurance_transaction_page/{id}/{type}', [\App\Http\Controllers\Company\CashTransactionController::class, 'transaction_view'])->name('company_insurance_transaction_view');
        Route::put('company_insurance_transaction_page/{id}', [\App\Http\Controllers\Company\CashTransactionController::class, 'attachment_page_update'])->name('company_insurance_requests_data_add_attachment_update');


        //    ----------------------- Transaction view -----------------------


        //    ---------------------------------------------------------------------------------------------------------------- Cart Page view - Company without insurance page ----------------------------------------------------------------------------------------------------------------------

        //    ----------------------- Company insurance requests - Add and update attachment -----------------------

//        Route::get('company_insurance_requests_data_add_attachment/{id}', [\App\Http\Controllers\Company\CashTransactionController::class, 'attachment_page'])->name('company_insurance_requests_data_add_attachment');
//        Route::put('company_insurance_requests_data_add_attachment/{id}', [\App\Http\Controllers\Company\CashTransactionController::class, 'attachment_page_update'])->name('company_insurance_requests_data_add_attachment_update');


        //    ----------------------- Company insurance requests - Add and update attachment -----------------------

        //    ----------------------- Company insurance requests - Insurance Requested Company [ Cash Transaction Requests ] -----------------------

        Route::get('company_insurance_requests_data_cash', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'view_insurance_history_cash'])->name('company.view_insurance_history_cash');

        //    ----------------------- Company insurance requests - Insurance Requested Company [ Cash Transaction Requests ] -----------------------

        //    ----------------------- Company Transaction History -----------------------

        Route::get('company_transaction_history_data', [\App\Http\Controllers\Company\Farmer\CompanyCanInsureFarmerController::class, 'insurance_transaction_history'])->name('company.transaction_history_data');

        //    ----------------------- Company Transaction History -----------------------

    });

//    ------------------------------------------------------------------------------------------------ Company will be able to insurance farmers ---------------------------------------------------------------------------------------
});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------
