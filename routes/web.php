<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPolicyController;
use App\Http\Controllers\Company\RegisterFieldAgentController;
use App\Http\Controllers\Farmer\CattleRegistrationController;
use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\Farmer\FarmerProfileController;
use App\Http\Controllers\SuperAdmin\CompanyRequest;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\RegisterController;
use App\Models\CattleRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view("front.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------------------------------------------- Logout --------------------------------------------------------------------


Route::middleware('auth')->group(function () {
    Route::get('log_out', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('log_out');
});


// -------------------------------------------------------------------- Logout --------------------------------------------------------------------


// -------------------------------------------------------------------- Super Admin --------------------------------------------------------------------


Route::middleware(['auth', 'super.admin'])->prefix('superAdmin')->group(function () {


//    Route::get('admin-profile', [\App\Http\Controllers\SuperAdmin\SuperAdminController::class,'profile']);

//    ----------------------------- Profile -----------------------------

    Route::resource('profile', ProfileController::class);

//    ----------------------------- Profile -----------------------------


//    ----------------------------- Register Company/NGO/Bank -----------------------------

    Route::get("register_company", [RegisterController::class, "index"])->name("sp_register_company");
    Route::post("register_company", [RegisterController::class, "store"])->name("sp_register_company_store");

//    ----------------------------- Register Company/NGO/Bank -----------------------------

//    ----------------------------- Company Request -----------------------------

    Route::get("company_request", [CompanyRequest::class, "index"])->name("sp.company_request");

//    ----------------------------- Company Request -----------------------------


//    ----------------------------- History -----------------------------

    Route::get("history", [CompanyRequest::class, "history"])->name("sp.user_history");

//    ----------------------------- History -----------------------------

});

// -------------------------------------------------------------------- Super Admin --------------------------------------------------------------------

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


Route::middleware(['auth', 'farmer'])->prefix('farmer')->group(function () {

//    ----------------------------- Dashboard -----------------------------

    Route::get('dashboard', [FarmerController::class, 'index']);

//    ----------------------------- Dashboard -----------------------------

//    -------------------------- Farmer Profile -----------------------------

    Route::resource('farmer_profile', FarmerProfileController::class);

//    -------------------------- Farmer Profile -----------------------------

    //    -------------------------- Cattle Registration -----------------------------

    Route::resource('cattle_register', CattleRegistrationController::class);

//    -------------------------- Cattle Registration -----------------------------

//    -------------------------- Cattle Registration -----------------------------

//    -------------------------- view registered cattle -----------------------------

    Route::get('cattle_list', [FarmerController::class, 'view_registered_cattle'])->name('cattle.list');

//    -------------------------- view registered cattle -----------------------------


});

// -------------------------------------------------------------------- Farmer --------------------------------------------------------------------


// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'company'])->prefix('company')->group(function () {
    Route::get('test', function () {
        return "Company";
    });

//    -------------------------- Register Field Agent -----------------------------

    Route::resource('farmer_register', RegisterFieldAgentController::class);


//    -------------------------- Register Field Agent -----------------------------

//    -------------------------- Registered Farmer / Agents -----------------------------

    Route::get('registered', [CompanyController::class,'registered_farmers'])->name('company.farmer_registered');

//    -------------------------- Registered Farmer / Agents -----------------------------

//    -------------------------- Policy Creation -----------------------------

    Route::resource('policy', CompanyPolicyController::class);

//    -------------------------- Policy Creation -----------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------


