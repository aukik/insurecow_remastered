<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Farmer\CattleRegistrationController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\Farmer\FarmerProfileController;
use App\Http\Controllers\Farmer\InsuranceRequestController;
use App\Http\Controllers\ml\ClaimController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view("front.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------------------------------------------- Test Phase [ dashboard ] --------------------------------------------------------------------

//Route::middleware('auth')->group(function (){
//    Route::get('dashboard', function (){
//        return view("dashboard.view");
//    })->name('dashboard');
//});

// -------------------------------------------------------------------- Test Phase [ dashboard ] --------------------------------------------------------------------

// -------------------------------------------------------------------- Logout --------------------------------------------------------------------


Route::middleware('auth')->group(function () {
    Route::get('log_out', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('log_out');
});


// -------------------------------------------------------------------- Logout --------------------------------------------------------------------


// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


Route::middleware(['auth', 'farmer'])->prefix('farmer')->group(function () {

//    ----------------------------- Dashboard -----------------------------

    Route::get('dashboard', [FarmerController::class, 'index']);

//    ----------------------------- Dashboard -----------------------------


//    -------------------------- Farmer Profile -----------------------------

    Route::resource('farmer_profile', FarmerProfileController::class);
    Route::get('view_farmer_profile', [FarmerProfileController::class, 'get_farmer_info'])->name('farmer.view_profile');

//    -------------------------- Farmer Profile -----------------------------


    //    ----------------------------- Cattle Registration Middleware Block ----------------------------------

    Route::middleware('farmer.cattle_reg')->group(function () {

        //    -------------------------- Cattle Registration -----------------------------

        Route::resource('cattle_register', CattleRegistrationController::class);

        //    -------------------------- Cattle Registration -----------------------------

        //    -------------------------- Cattle Registration -----------------------------

        //    -------------------------- view registered cattle -----------------------------

        Route::get('cattle_list', [FarmerController::class, 'view_registered_cattle'])->name('cattle.list');
        Route::get('cattle_list_with_farm/{id}', [FarmerController::class, 'view_registered_cattle_with_farm'])->name('cattle.list.with_farm');
        Route::get('cattle_list_single/{id}', [FarmerController::class, 'view_registered_cattle_single'])->name('cattle.list.single');

        //    -------------------------- view registered cattle -----------------------------

        //    ----------------------- Cattle registration verification reports -----------------------

        Route::get("registration_verification_reports", [FarmerController::class, 'cattle_reg_ver_reports'])->name('registration_verification_reports');

        //    ----------------------- Cattle registration verification reports -----------------------
    });

    //    ----------------------------- Cattle Registration Middleware Block ----------------------------------


    //    ----------------------------- Insurance Middleware Block ----------------------------------


    Route::middleware('farmer.insurance')->group(function () {


        //    ----------------------- Insurance Packages by companies -----------------------

        Route::get('insurance_packages', [FarmerController::class, 'company_insurance_packages'])->name('insurance.packages');
        Route::post('insurance_packages', [FarmerController::class, 'company_insurance_packages_post'])->name('insurance.packages.post');

        //    ----------------------- Insurance Packages by companies -----------------------

        //    ----------------------- Farmer requests for insurance to company -----------------------

        Route::post('farmer_insurance_request', [InsuranceRequestController::class, 'request_for_insurance'])->name('farmer_insurance_request');

        //    ----------------------- Farmer requests for insurance to company -----------------------


        //    ----------------------- Farmers view insurance history -----------------------

        Route::get("farmer_insurance_request", [InsuranceRequestController::class, 'view_insurance_history'])->name('farmer_view_insurance_history');

        //    ----------------------- Farmers view insurance history -----------------------


        //    ----------------------- View insurance Package by company offers -----------------------

        Route::get('single_insurance_packages/{id}/{id2}', [FarmerController::class, 'company_insurance_packages_single'])->name('single.insurance.packages');

        //    ----------------------- View insurance Package by company offers -----------------------


        //    ----------------------- Claim Insurance -----------------------

        Route::get("claim_insurance_test/{id}", [ClaimController::class, 'index'])->name('claim.index');
        Route::post("claim_insurance_test", [ClaimController::class, 'store'])->name('claim.store');

        //    ----------------------- Claim Insurance -----------------------

        //    ----------------------- Insurance History -----------------------

        Route::get("insurance_history", [FarmerController::class, 'insurance_history'])->name('insurance.history.index');

        //    ----------------------- Insurance History -----------------------


    });

    //    ----------------------------- Insurance Middleware Block ----------------------------------


});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------

// -------------------------------------------------------------------- Change Password --------------------------------------------------------------------

Route::middleware('auth')->group(function () {
//    -------------------------- Change Password view -----------------------------

    Route::get('change_password', [ChangePasswordController::class, 'viewPasswordPage'])->name('view.password');
    Route::post('change_password', [ChangePasswordController::class, 'updatePassword'])->name('view.password.post');

//    -------------------------- Change Password view -----------------------------

});

// -------------------------------------------------------------------- Change Password --------------------------------------------------------------------


//Route::get("test_data", function () {
//    return view("farmer.admin-content.insurance_packages.single-result");
//});


// -------------------------------------------------------------------- Payment Gateway --------------------------------------------------------------------

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name("pay");
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// -------------------------------------------------------------------- Payment Gateway --------------------------------------------------------------------
