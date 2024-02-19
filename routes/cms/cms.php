<?php

use Illuminate\Support\Facades\Route;


// -------------------------------------------------------------------- Front Page Routes --------------------------------------------------------------------


Route::get('test_front_page', [\App\Http\Controllers\Cms\FrontPageController::class,'index']);


// -------------------------------------------------------------------- Front Page Routes --------------------------------------------------------------------


// -------------------------------------------------------------------- CMS --------------------------------------------------------------------


Route::middleware(['auth', 'super.admin'])->prefix('cms')->group(function () {

    //    -----------------------------  Slider Image -----------------------------

    Route::resource('slider_image', \App\Http\Controllers\Cms\SliderImageController::class);


    //    -----------------------------  Slider -----------------------------
    Route::resource('slider', \App\Http\Controllers\Cms\SliderController::class);


    //    -----------------------------  About us -----------------------------

    Route::resource('about', \App\Http\Controllers\Cms\AboutController::class);

    //    -----------------------------  Product and Services -----------------------------

    Route::resource('productandservices', \App\Http\Controllers\Cms\ProductandservicesController::class);

    //    -----------------------------  Team -----------------------------

    Route::resource('team', \App\Http\Controllers\Cms\TeamController::class);

    //    -----------------------------  Achievement -----------------------------

    Route::resource('achievement', \App\Http\Controllers\Cms\AchievementController::class);

    //    -----------------------------  Posts -----------------------------

    Route::resource('post', \App\Http\Controllers\Cms\PostController::class);

    //    -----------------------------  Partners -----------------------------


    Route::resource('partner', \App\Http\Controllers\Cms\PartnerController::class);


    //    -----------------------------  Blogs -----------------------------

    Route::resource('blogs',\App\Http\Controllers\Cms\BlogController::class);


    //    -----------------------------  gallery -----------------------------

    Route::resource('gallery',\App\Http\Controllers\Cms\GalleryController::class);

    //    -----------------------------  gallery -----------------------------

    Route::resource('testimonial',\App\Http\Controllers\Cms\TestimonialController::class);


});





// -------------------------------------------------------------------- CMS --------------------------------------------------------------------
