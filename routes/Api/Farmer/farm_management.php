<?php

use App\Http\Controllers\API\Farmer\Farm_management\AnimalInformationController;
use App\Http\Controllers\API\Farmer\Farm_management\FeedingAndNutritionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'api.farmer'])->prefix('farm_management')->group(function () {

//    ------------------------------------------------ Animal Information ------------------------------------------------

    Route::get("view_animal_information", [AnimalInformationController::class, 'index']);
    Route::post("store_animal_information", [AnimalInformationController::class, 'store']);
    Route::delete("delete_animal_information/{id}", [AnimalInformationController::class, 'destroy']);

//    ------------------------------------------------ Animal Information ------------------------------------------------

//    ------------------------------------------------ Feeding And Nutrition ------------------------------------------------

    Route::get("view_feeding_and_nutrition_information", [FeedingAndNutritionController::class, 'index']);
    Route::post("store_feeding_and_nutrition_information", [FeedingAndNutritionController::class, 'store']);
    Route::delete("delete_feeding_and_nutrition_information/{id}", [FeedingAndNutritionController::class, 'destroy']);

//    ------------------------------------------------ Feeding And Nutrition ------------------------------------------------

});
