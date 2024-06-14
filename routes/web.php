<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index')->name('home')->middleware(['auth', 'short.session']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login-proses', 'Auth\LoginController@login')->name('masuk');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
    ->name('sales-purchases.chart')->middleware(['auth', 'short.session']);

Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
    ->name('current-month.chart')->middleware(['auth', 'short.session']);

Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
    ->name('payment-flow.chart')->middleware(['auth', 'short.session']);

Auth::routes(['register' => false]);
