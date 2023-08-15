<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/message')->group(function () {
    Route::post('/store', 'App\Http\Controllers\MessageController@store');
    Route::post('/fetch', 'App\Http\Controllers\MessageController@fetch');
    Route::post('/fetch/guest', 'App\Http\Controllers\MessageController@fetchGuest');
});
