<?php

use App\Http\Controllers\API\Farmer\Authentication\AuthController;
use App\Http\Controllers\API\Farmer\CattleRegistration\CattleRegistrationController;
use App\Http\Controllers\API\Farmer\Claim\ClaimRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// ---------------------------------------------- API login and registration portion added , farmer sided ----------------------------------------------

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'api.farmer'])->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('farmer')->group(function () {
        // ---------------------- Animal registration  ----------------------

        Route::resource('cattle_registration', CattleRegistrationController::class);

// ---------------------- Animal registration  ----------------------

        // ---------------------- Animal claim ----------------------

        Route::resource('claim_api', ClaimRegistrationController::class);

// ---------------------- Animal claim ----------------------
    });


// ---------------------------------------------- Animal registration middleware ----------------------------------------------


//    Route::middleware('api.farmer.cattle_reg')->prefix('farmer')->group(function () {
//
//
//    });


// ---------------------------------------------- Animal registration middleware ----------------------------------------------


});


// ---------------------------------------------- API login and registration portion added , farmer sided ----------------------------------------------
