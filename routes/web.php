<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index']);

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('mains', App\Http\Controllers\MainController::class);
    Route::resource('abouts', App\Http\Controllers\AboutController::class);
    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('contacts', App\Http\Controllers\ContactController::class);
});

Route::post('/send', [\App\Http\Controllers\FrontController::class, 'sendEmail']);
Route::get('freedom-payment', [App\Http\Controllers\FreedomController::class,"index"])->name("freedom-payment");
Route::get('freedom-payment-info/{uuid}', [App\Http\Controllers\FreedomController::class,"info"])->name("freedom-info");

Route::get("clean-all",function (){
    \Illuminate\Support\Facades\Artisan::call("config:cache");
    \Illuminate\Support\Facades\Artisan::call("config:clear");
    \Illuminate\Support\Facades\Artisan::call("cache:clear");
    \Illuminate\Support\Facades\Artisan::call("optimize:clear");
    return "OK";
});


Route::resource('advantages', App\Http\Controllers\AdvantageController::class);


Route::resource('freedomRequests', App\Http\Controllers\FreedomRequestController::class);


Route::resource('freedomTokens', App\Http\Controllers\FreedomTokenController::class);


Route::resource('freedomResponses', App\Http\Controllers\FreedomResponseController::class);
