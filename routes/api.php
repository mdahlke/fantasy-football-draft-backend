<?php

use App\Http\Controllers\DraftPickController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;

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
Route::middleware('api')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('', [UserController::class, 'user'])->name('me');
            Route::put('', [UserController::class, 'update'])->name('update');
            Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
                Route::put('', [PasswordController::class, 'update'])->name('update');
            });
        });
    });
    Route::prefix('team')->group(function () {
        Route::get('', [TeamController::class, 'index']);
        Route::get('/{team}', [TeamController::class, 'show']);
        Route::get('/{team}/picks', [DraftPickController::class, 'teamPicks']);
    });
    Route::prefix('draft')->group(function () {
        Route::get('', [\App\Http\Controllers\DraftController::class, 'index']);
        Route::get('{draft}/player', [PlayerController::class, 'index']);
        Route::get('{draft}/pick', [DraftPickController::class, 'index']);
        Route::post('{draft}/pick', [DraftPickController::class, 'create']);
    });
});
