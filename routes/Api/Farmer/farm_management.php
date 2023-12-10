<?php

use App\Http\Controllers\API\Farmer\Farm_management\AnimalInformationController;
use App\Http\Controllers\API\Farmer\Farm_management\BreedingController;
use App\Http\Controllers\API\Farmer\Farm_management\ExpenseController;
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

//    ------------------------------------------------ Breeding And Nutrition ------------------------------------------------

    Route::get("view_breeding_information", [BreedingController::class, 'index']);
    Route::post("store_breeding_information", [BreedingController::class, 'store']);
    Route::delete("delete_breeding_information/{id}", [BreedingController::class, 'destroy']);

//    ------------------------------------------------ Breeding And Nutrition ------------------------------------------------


    //    ------------------------------------------------ Expenses ------------------------------------------------

    Route::get("view_expense_information", [ExpenseController::class, 'index']);
    Route::post("store_expense_information", [ExpenseController::class, 'store']);
    Route::delete("delete_expense_information/{id}", [ExpenseController::class, 'destroy']);

//    ------------------------------------------------ Expenses ------------------------------------------------

});
