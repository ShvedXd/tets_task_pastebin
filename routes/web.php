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



Route::group(['namespace' => '\App\Http\Controllers\Paste'], function () {
    Route::get('/paste', 'IndexController')->name('paste.index');
    Route::post('/paste', 'StoreController')->name('paste.store');
    Route::get('/paste/{paste}', 'ShowController')->name('paste.show');

});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/auth', '\App\Http\Controllers\SocialController@index')->name('auth.vk');
    Route::get('/vk/auth/callback', '\App\Http\Controllers\SocialController@callback');
});
Route::get('/user/pastes', '\App\Http\Controllers\Paste\ShowAnyController')->name('paste.showAny');

Auth::routes();

Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
