<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;

// Controllers API (web CRUD côté admin)
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SeancesController;
use App\Http\Controllers\Api\ClassesController;


/*
|--------------------------------------------------------------------------
| PAGE MOBILE
|--------------------------------------------------------------------------
*/
Route::get('/mobile', function () {
    return view('mobile');
})->name('mobile');


/*
|--------------------------------------------------------------------------
| PAGE DE CONNEXION
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('accueil');
    }

    return view('connexion');
})->name('connexion');


/*
|--------------------------------------------------------------------------
| AUTH (connexion / déconnexion / user connecté)
|--------------------------------------------------------------------------
*/
Route::post('/connexion', [AuthController::class, 'connexion'])->name('connexion.post');
Route::get('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion.post');
Route::get('/me', [AuthController::class, 'me'])->name('me');


/*
|--------------------------------------------------------------------------
| ROUTES PROTÉGÉES (UTILISATEUR CONNECTÉ)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ACCUEIL (séances utilisateur)
    |--------------------------------------------------------------------------
    */
    Route::get('/accueil', [AccueilController::class, 'getSeances'])->name('accueil');

    Route::get('/accueil/create', [AccueilController::class, 'create'])->name('accueil.create');
    Route::post('/seances', [AccueilController::class, 'store'])->name('accueil.store');

    Route::get('/seances/{id}/edit', [AccueilController::class, 'edit'])->name('accueil.edit');
    Route::put('/seances/{id}', [AccueilController::class, 'update'])->name('accueil.update');
    Route::delete('/seances/{id}', [AccueilController::class, 'destroy'])->name('accueil.destroy');


    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA (SEULEMENT ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {

        Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');




        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


        /*
        |--------------------------------------------------------------------------
        | SEANCES (ADMIN CRUD)
        |--------------------------------------------------------------------------
        */
        Route::get('/seances', [SeancesController::class, 'index'])->name('seances');
        Route::get('/seances/create', [SeancesController::class, 'create'])->name('seances.create');
        Route::post('/seances', [SeancesController::class, 'store'])->name('seances.store');
        Route::get('/seances/{id}', [SeancesController::class, 'show'])->name('seances.show');
        Route::put('/seances/{id}', [SeancesController::class, 'update'])->name('seances.update');
        Route::delete('/seances/{id}', [SeancesController::class, 'destroy'])->name('seances.destroy');


        /*
        |--------------------------------------------------------------------------
        | CLASSES
        |--------------------------------------------------------------------------
        */
        Route::get('/classes', [ClassesController::class, 'index'])->name('classes');
        Route::get('/classes/create', [ClassesController::class, 'create'])->name('classes.create');
        Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
        Route::get('/classes/{id}', [ClassesController::class, 'show'])->name('classes.show');
        Route::put('/classes/{id}', [ClassesController::class, 'update'])->name('classes.update');
        Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');

    });

});