<?php

use App\Http\Controllers\API\Farmer\Farm_management\AnimalInformationController;
use App\Http\Controllers\API\Farmer\Farm_management\BreedingController;
use App\Http\Controllers\API\Farmer\Farm_management\BudgetAndForecastingController;
use App\Http\Controllers\API\Farmer\Farm_management\ExpenseController;
use App\Http\Controllers\API\Farmer\Farm_management\ExpenseWeightAverageController;
use App\Http\Controllers\API\Farmer\Farm_management\FeedingAndNutritionController;
use App\Http\Controllers\API\Farmer\Farm_management\IncomeAndSellsController;
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

    //    ------------------------------------------------ Expenses weight average ------------------------------------------------

    Route::get("view_expense_wa_information", [ExpenseWeightAverageController::class, 'index']);
    Route::post("store_expense_wa_information", [ExpenseWeightAverageController::class, 'store']);
    Route::delete("delete_expense_wa_information/{id}", [ExpenseWeightAverageController::class, 'destroy']);

    //    ------------------------------------------------ Expenses weight average ------------------------------------------------

    //    ------------------------------------------------ Income and sells ------------------------------------------------

    Route::get("view_income_and_sells_information", [IncomeAndSellsController::class, 'index']);
    Route::post("store_income_and_sells_information", [IncomeAndSellsController::class, 'store']);
    Route::delete("delete_income_and_sells_information/{id}", [IncomeAndSellsController::class, 'destroy']);

    //    ------------------------------------------------ Income and sells ------------------------------------------------

    //    ------------------------------------------------ Budget And Forecasting ------------------------------------------------

    Route::get("view_budget_and_forecasting_information", [BudgetAndForecastingController::class, 'index']);
    Route::post("store_budget_and_forecasting_information", [BudgetAndForecastingController::class, 'store']);
    Route::delete("delete_budget_and_forecasting_information/{id}", [BudgetAndForecastingController::class, 'destroy']);

    //    ------------------------------------------------ Budget And Forecasting ------------------------------------------------

});
