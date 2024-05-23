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

Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
->name('sales-purchases.chart');

Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
    ->name('current-month.chart');

Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
    ->name('payment-flow.chart');

Auth::routes(['register' => false]);
