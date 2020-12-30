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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('mains', App\Http\Controllers\MainController::class);


Route::resource('abouts', App\Http\Controllers\AboutController::class);

Route::resource('services', App\Http\Controllers\ServiceController::class);

Route::resource('projects', App\Http\Controllers\ProjectController::class);

Route::resource('contacts', App\Http\Controllers\ContactController::class);
