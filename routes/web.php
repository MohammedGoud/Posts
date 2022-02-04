<?php

use Illuminate\Support\Facades\App;
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

Route::get('locale/{locale}', function ($locale) {
    App::setLocale($locale);
    Session::put('locale', $locale);
    return redirect()->back();
});
/**
 * Register Routes
 */
Route::get('/register', 'App\Http\Controllers\RegisterController@show')->name('register');
Route::post('/register', 'App\Http\Controllers\RegisterController@handle')->name('register_handle');

/**
 * Login Routes
 */
Route::get('/login', 'App\Http\Controllers\LoginController@show')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@handle')->name('login_handle');

Route::group(['middleware' => ['auth']], function () {
    /**
     * Posts Routes
     */
    Route::resource('posts', 'App\Http\Controllers\PostController');
    /**
     * Logout Routes
     */
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout_handle');
});
