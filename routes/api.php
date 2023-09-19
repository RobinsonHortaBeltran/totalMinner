<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Campaings;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('users')->group(function () {
    Route::get('/',              [UserController::class, 'index']);
    Route::get('show/{id}',      [UserController::class, 'show']);
    Route::get('ver/{id}',       [UserController::class, 'showAll']);
    Route::post('/new',          [UserController::class, 'store']);
    Route::put('put/{id}',       [UserController::class, 'update']);
    Route::delete('delete/{id}', [UserController::class, 'destroy']);
    Route::post('login',         [UserController::class, 'login']);

});

Route::prefix('campaing')->group(function () {
    Route::get('/',              [Campaings::class, 'index']);
    Route::get('show/{id}',      [Campaings::class, 'show']);
    Route::get('ver/{id}',       [Campaings::class, 'showAll']);
    Route::post('/new',          [Campaings::class, 'store']);
    Route::put('put/{id}',       [Campaings::class, 'update']);
    Route::delete('delete/{id}', [Campaings::class, 'destroy']);
});