<?php

use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'super.admin'])->prefix('cms')->group(function () {

    //    -----------------------------  Slider Image -----------------------------

    Route::resource('slider_image', \App\Http\Controllers\Cms\SliderImageController::class);


    //    -----------------------------  Slider -----------------------------
    Route::resource('slider',\App\Http\Controllers\Cms\SliderController::class);


    //    -----------------------------  About us -----------------------------

    Route::resource('about',\App\Http\Controllers\Cms\AboutController::class);

    //    -----------------------------  Product and Services -----------------------------

    Route::resource('productandservices',\App\Http\Controllers\Cms\ProductandservicesController::class);


});





// -------------------------------------------------------------------- Company --------------------------------------------------------------------
