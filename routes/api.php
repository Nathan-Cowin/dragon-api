<?php

use App\Http\Controllers\TrailerCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v1')->name('api.')->group(function () {
    Route::apiResource('trailer-categories', TrailerCategoryController::class)->only('index');
});
