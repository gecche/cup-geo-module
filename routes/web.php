<?php

use Illuminate\Support\Facades\Route;
use Modules\Unico\Http\Controllers\CupGeoController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cup-geos', CupGeoController::class)->names('cup-geo');
});