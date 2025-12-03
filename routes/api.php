<?php

use Illuminate\Support\Facades\Route;
use Modules\Unico\Http\Controllers\CupGeoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('cup-geos', CupGeoController::class)->names('cup-geo');
});
/*
