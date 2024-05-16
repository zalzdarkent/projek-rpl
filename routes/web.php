<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login-proses', 'Auth\LoginController@login')->name('masuk');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes(['register' => false]);
