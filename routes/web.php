<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => '\App\Http\Controllers\Main', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => '\App\Http\Controllers\Post', 'prefix' => 'post'], function () {
    Route::get('/create', 'CreateController')->name('post.create')->middleware('auth');
    Route::post('/store', 'StoreController')->name('post.store')->middleware('auth');
    Route::get('/{post}', 'ShowController')->name('post.show');
});

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('/login', function () { return view('auth.login'); } )->name('auth.show.login');
    Route::get('/register', function () { return view('auth.register'); } )->name('auth.show.register');
});

Route::group(['namespace' => '\App\Http\Controllers\Auth', 'prefix' => 'auth'], function () {
    Route::post('/login', 'LoginController')->name('auth.login');
    Route::post('/register', 'RegisterController')->name('auth.register');
    Route::post('/logout', 'LogoutController')->name('auth.logout');
});

Route::group(['namespace' => '\App\Http\Controllers\Profile', 'prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('profile.index');
    Route::get('/edit', 'EditController')->name('profile.edit');
    Route::post('/update', 'UpdateController')->name('profile.update');
});
