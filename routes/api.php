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


Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/infos", "Api\InfoController");
Route::resource("/specializations", "Api\SpecializationController");

Route::post("/messages", "Api\MessageController@store");
Route::post("/reviews", "Api\ReviewController@store");