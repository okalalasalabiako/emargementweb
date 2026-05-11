<?php

use App\Http\Controllers\Api\SeancesController;
use App\Http\Controllers\Api\ApiEmargementsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;


// API Routes
//Les routes API sont définies dans ce fichier. Elles sont chargées par le RouteServiceProvider et assignées au groupe de middleware "api".


Route::post('/auth/login', [ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [ApiAuthController::class, 'logout']);
    Route::get('/auth/me', [ApiAuthController::class, 'me']);
    Route::post('/emargements', [ApiEmargementsController::class, 'store']);
    Route::apiResource('seances', SeancesController::class);
    Route::apiResource('emargements', ApiEmargementsController::class);
});

