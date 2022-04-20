<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('infos', 'InfoController');
        
        Route::get("messages", "MessageController@index")->name("messages.index");
        
        Route::get("reviews", "ReviewController@index")->name("reviews.index");
    });
    
Route::get('/home', 'HomeController@index')->name('home');

Route::get('{any?}', function () {
    return view('home');
})->where('any', '.*');