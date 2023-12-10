<?php

use App\Http\Controllers\API\Farmer\Farm_management\AnimalInformationController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'api.farmer'])->prefix('farm_management')->group(function () {

//    ------------------------------------------------ Animal Information ------------------------------------------------

    Route::get("view_animal_information", [AnimalInformationController::class,'index']);
    Route::post("store_animal_information", [AnimalInformationController::class,'store']);
    Route::delete("delete_animal_information/{id}", [AnimalInformationController::class,'destroy']);

//    ------------------------------------------------ Animal Information ------------------------------------------------

});
