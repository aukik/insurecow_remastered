<?php

use App\Http\Controllers\API\Farmer\Authentication\AuthController;
use App\Http\Controllers\API\Farmer\CattleRegistration\CattleRegistrationController;
use App\Http\Controllers\API\Farmer\Claim\ClaimRegistrationController;
use App\Http\Controllers\API\Farmer\Farm\FarmController;
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


//    -------------------------------- claim resource api --------------------------------


    Route::apiResource('farmer/claim_api', ClaimRegistrationController::class);


//    -------------------------------- claim resource api --------------------------------


//    -------------------------------- claim status check --------------------------------

    Route::get('farmer/claim_status_check_api/{cattle_id}', [ClaimRegistrationController::class, 'claim_success_check']);

//    -------------------------------- claim status check --------------------------------


//    -------------------------------- registration resource api --------------------------------

    Route::apiResource('farmer/cattle_registration', CattleRegistrationController::class);

//    -------------------------------- registration resource api --------------------------------


//    -------------------------------- farms --------------------------------

    Route::apiResource('farmer/farm_api', FarmController::class);


//    -------------------------------- farms --------------------------------


});


// ---------------------------------------------- API login and registration portion added , farmer sided ----------------------------------------------
