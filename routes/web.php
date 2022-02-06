<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/register',  [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'handle'])->name('register_handle');

/**
 * Login Routes
 */
Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'handle'])->name('login_handle');

/**
 * Password Routes
 */
Route::get('forgot', [LoginController::class, 'forgot'])->name('forgot');
Route::post('forgot', [LoginController::class, 'handle_forget_password'])->name('handle_forget_password');
Route::get('reset-password/{token}', [LoginController::class, 'reset'])->name('reset');
Route::post('reset-password', [LoginController::class, 'handle_reset_password'])->name('handle_reset_password');

/**
 * Authenticated Routes
 */
Route::group(['middleware' => ['auth']], function () {
    /**
     * Posts Routes
     */
    Route::resource('posts', PostController::class);
    /**
     * Logout Routes
     */
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout_handle');
});
