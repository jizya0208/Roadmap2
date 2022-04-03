<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;

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
Route::get('/', 'App\Http\Controllers\RestaurantController@index')->name('restaurants');
Route::resource('restaurant', RestaurantController::class);
Route::resource('restaurant.reviews', ReviewController::class);
// // Route::get('/reviews', 'app\Http\Controllers\ReviewtController@create')->name('reviews');
// Route::get('/restaurant/create', 'App\Http\Controllers\RestaurantController@showCreate')->name('restaurant.create');
// Route::post('/restaurant/store', 'App\Http\Controllers\RestaurantController@execStore')->name('restaurant.store');
// Route::get('/restaurant/show/{id}', 'App\Http\Controllers\RestaurantController@showDetail')->name('restaurant.show');
// Route::post('/restaurant・/delete/{id}', [ContentController::class, 'delete'])->name('delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
