<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('trainers', TrainerController::class);
    Route::apiResource('pokemons', PokemonController::class);
    Route::apiResource('classes', ClassController::class);
    Route::apiResource('types', TypesController::class);
    Route::apiResource('groups', GroupController::class);
});