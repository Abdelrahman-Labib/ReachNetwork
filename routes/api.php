<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V100\CategoryController;
use App\Http\Controllers\Api\V100\TagController;
use App\Http\Controllers\Api\V100\AdvertiserController;
use App\Http\Controllers\Api\V100\AdvertisementController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::apiResource('categories', CategoryController::class);

    Route::apiResource('tags', TagController::class);

    Route::get('advertisement/filter', AdvertisementController::class);

    Route::get('advertiser/{user}', AdvertiserController::class);
});
