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

Route::get('/', 'FrontEndController@welcome');

Route::get('/redis', function () {
    Redis::sadd('frontend-frameworks', ['angular', 'ember']);

    dd(Redis::smembers('frontend-frameworks'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('series/{series}', 'FrontEndController@series');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/logout', function () {
    auth()->logout();
});


Route::get('register/confirm', 'ConfirmEmailController@index')->name('confirm-email');
