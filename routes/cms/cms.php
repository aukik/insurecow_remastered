<?php

use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------- Company --------------------------------------------------------------------


Route::middleware(['auth', 'super.admin'])->prefix('cms')->group(function () {

    //    -----------------------------  Slider Image -----------------------------

    Route::resource('slider_image', \App\Http\Controllers\Cms\SliderImageController::class);

    //    -----------------------------  Slider Image -----------------------------

});


// -------------------------------------------------------------------- Company --------------------------------------------------------------------
