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

// レストラン一覧画面を表示
Route::get('/', 'RestaurantController@showList')->name('restaurants');
Route::get('/reviews', 'ReviewtController@create')->name('restaurants');
