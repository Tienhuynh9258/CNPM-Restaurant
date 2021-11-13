<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodOrder;

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

Route::get('/', 'FoodController@getAllFood')->name('home');

Route::get('about-us', function(){
    return view('about-us');
})->name('about-us');

Route::get('payment', function(){
    return view('payment');
})->name('payment');

Route::get('contact-us', function(){
    return view('contact-us');
})->name('contact-us');

Route::get('order-his', function(){
    return view('order-his');
})->name('order-his');

Route::post('login', 'AuthController@login')->name('login');

Route::post('logout', 'AuthController@logout')->name('logout');


Route::get('admin', function(){
    return view('admin');
})->name('admin');


Route::post('save-food', 'AdminController@saveFoods')->name('saveFoods');

Route::post('delete-food', 'AdminController@deleteFoods')->name('deleteFoods');

Route::post('save-employees', 'AdminController@saveEmployees')->name('saveEmployees');

Route::get('reveneu-in-range', 'AdminController@getReveneu_InRange')->name('getReveneu_InRange');

Route::get('get-all-book-by-cate', 'FoodController@getAllByCategory')->name('getAllByCategory');//bug

Route::get('get-all-book-by-author', 'FoodController@getAllByPrice')->name('getAllByPrice');//bug

Route::get('get-all-book-by-key', 'FoodController@getAllByKey')->name('getAllByKey');

Route::post('payment', 'FoodController@payment')->name('payment');

Route::resource('food-order',FoodOrder::class);

Route::get('food',[FoodController::class, 'index'])->name('food.index');

Route::put('food/{id}',[FoodController::class, 'update'])->name('food.update');











