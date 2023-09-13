<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SuperAdmin\CompanyRequest;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\RegisterController;
use App\Models\CattleRegistration;
use App\Models\Permission;
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

//    ----------------------------- Registered Companies -----------------------------

    Route::get("registered_companies", [CompanyRequest::class, "registered_companies"])->name("sp.registered_companies");


//    ----------------------------- Registered Companies -----------------------------

//    ----------------------------- Permission Setup -----------------------------

    Route::resource("permission", PermissionController::class);

//    ----------------------------- Permission Setup -----------------------------

});

// -------------------------------------------------------------------- Super Admin --------------------------------------------------------------------
