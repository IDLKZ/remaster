<?php

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

Route::post("/send-mail", [\App\Http\Controllers\FrontController::class, 'sendEmail']);
Route::post("/freedom-info", [\App\Http\Controllers\Api\FreedomController::class, 'info']);
Route::any("/freedom-success", [\App\Http\Controllers\Api\FreedomController::class, 'success']);
Route::any("/freedom-failure", [\App\Http\Controllers\Api\FreedomController::class, 'failure']);
