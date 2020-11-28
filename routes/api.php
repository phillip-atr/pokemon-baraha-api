<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });

    Route::get('pokemons/filter', [PokemonController::class, 'filter']);

    Route::apiResource('trainers', TrainerController::class);
    Route::apiResource('pokemons', PokemonController::class);
    Route::apiResource('classes', ClassController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('groups', GroupController::class);
});
