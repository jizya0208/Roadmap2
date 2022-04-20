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

Route::get('/', 'App\Http\Controllers\RestaurantController@index')->name('restaurants'); // レストラン一覧画面を表示
Route::resource('restaurant', RestaurantController::class);
Route::resource('restaurant.reviews', ReviewController::class);
Route::post('/restaurant/{restaurant}/form', 'App\Http\Controllers\ReviewController@post')->name("form.send");
Route::get('/restaurant/{restaurant}/confirm', 'App\Http\Controllers\ReviewController@confirm')->name("form.confirm");
Route::get('/thanks', 'App\Http\Controllers\ReviewController@complete')->name("form.complete");


Route::get('/admin/login', function () {
    return view('adminLogin'); // blade.php
});
Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');

Route::middleware('auth:admins')->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/search', 'App\Http\Controllers\AdminDashboardController@search')->name('search');

// Route::prefix('admin')->group(function () {
//     Route::get('login', [LoginController::class, 'create'])->name('admin.login');
//     Route::post('login', [LoginController::class, 'store']);

//     Route::middleware('auth:admin')->group(function () {
//         Route::get('dashboard', [AdminDashboardController::class, 'index']);
//     });
// });
