<?php

use Illuminate\Support\Facades\Route;
use Modules\CupGeo\Http\Controllers\CupGeoController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cup-geos', CupGeoController::class)->names('cup-geo');
});