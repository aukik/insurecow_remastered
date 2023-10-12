<?php

use App\Http\Controllers\API\Farmer\Authentication\AuthController;
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

// ---------------------------------------------- Animal registration middleware ----------------------------------------------


    Route::middleware(['auth:sanctum', 'api.farmer.cattle_reg'])->group(function () {

// ---------------------- Animal registration middleware ----------------------



// ---------------------- Animal registration middleware ----------------------

    });


// ---------------------------------------------- Animal registration middleware ----------------------------------------------


});


// ---------------------------------------------- API login and registration portion added , farmer sided ----------------------------------------------
