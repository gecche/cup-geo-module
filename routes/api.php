<?php

use Illuminate\Support\Facades\Route;
use Modules\CupGeo\Http\Controllers\CupGeoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('cup-geos', CupGeoController::class)->names('cup-geo');
});
