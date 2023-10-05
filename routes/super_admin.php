<?php

use App\Http\Controllers\Farmer\FarmerController;
use App\Http\Controllers\Farmer\FirmController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SuperAdmin\CompanyRequest;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\RegisterController;
use Illuminate\Support\Facades\Route;

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

//    ----------------------------- Registered Resources -----------------------------

    Route::get("registered_companies", [CompanyRequest::class, "registered_companies"])->name("sp.registered_resources");
    Route::get("registered_farmers/{id}", [CompanyRequest::class, "farmers"])->name("sp.registered_farmers");
    Route::get("registered_cattle/{id}", [CompanyRequest::class, "cattle_list"])->name("sp.registered_cattle");
    Route::get("all_registered_farmers/", [CompanyRequest::class, "all_farmers"])->name("sp.all_registered_farmers");

    Route::get("registered_farms/", [FirmController::class, "index"])->name("sp.all_registered_farms");

//    ------------------ registered animals  ------------------

    Route::get("registered_animals/", [\App\Http\Controllers\SuperAdmin\AnimalController::class, "index"])->name("sp.all_registered_animals");

//    ------------------ registered animals  ------------------


    Route::get('cattle_list_with_farm/{id}', [FarmerController::class, 'view_registered_cattle_with_farm'])->name('sp.cattle.list.with_farm');
    Route::get('cattle_list_single/{id}', [FarmerController::class, 'view_registered_cattle_single'])->name('sp.cattle.list.single');


//    ----------------------------- Registered Resources -----------------------------

//    ----------------------------- Permission Setup -----------------------------

    Route::resource("permission", PermissionController::class);

//    ----------------------------- Permission Setup -----------------------------

});

// -------------------------------------------------------------------- Super Admin --------------------------------------------------------------------
