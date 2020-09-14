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

Route::get(
    '/donate', function () {
        return view('donation');
    }
);

Route::post('/', 'DonationController@submit')->name('donation.submit');

Route::get('/', 'DonationController@getInitialTableData');

Route::get('/pagination', 'DonationController@getTableData');

Route::get('/widget', 'DonationController@getWidgetData');

Route::get('/chart', 'DonationController@getChartData');