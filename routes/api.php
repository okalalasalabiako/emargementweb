<?php

use App\Http\Controllers\Api\SeancesController;
use App\Http\Controllers\Api\ApiEmargementsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/auth/login', [ApiAuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Route de test (temporairement hors authentification)
|--------------------------------------------------------------------------
*/
Route::get('/seances/{id}/apprenants', [ApiEmargementsController::class, 'listeApprenants']);

/*
|--------------------------------------------------------------------------
| Routes protégées par Sanctum
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/auth/logout', [ApiAuthController::class, 'logout']);

    Route::get('/auth/me', [ApiAuthController::class, 'me']);

    Route::post('/emargements', [ApiEmargementsController::class, 'store']);

    Route::apiResource('seances', SeancesController::class);

    Route::apiResource('emargements', ApiEmargementsController::class);

});
