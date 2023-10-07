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


Route::group(['middleware' => 'guest', 'namespace'=>'\App\Http\Controllers\Socials'], function () {
    Route::get('/vk/auth', 'VK\SocialController@index')->name('auth.vk');
    Route::get('/vk/auth/callback', 'VK\SocialController@callback');
    Route::get('/google/auth', 'Google\SocialController@index')->name('auth.google');
    Route::get('/google/auth/callback', 'Google\SocialController@callback');
});

Route::group(['namespace' => '\App\Http\Controllers\Complaint'], function () {
    Route::post('/complaint', 'StoreController')->name('complaint.store');
});


Route::get('/user/pastes', '\App\Http\Controllers\Paste\ShowAnyController')->name('paste.showAny');

Auth::routes();

Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/banned/{id}', '\App\Http\Controllers\Ban\BanController')->name('user.ban');
    Voyager::routes();
});
