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

Route::get('remove_Food', 'AdminController@remove_Food')->name('remove_Food');
Route::get('remove_Chef', 'AdminController@remove_Chef')->name('remove_Chef');
Route::get('remove_Clerk', 'AdminController@remove_Clerk')->name('remove_Clerk');
Route::post('upload_file_Employee', 'AdminController@upload_file_Employee')->name('upload_file_Employee');
//Route::get('upload_file_Food', 'AdminController@upload_file_Food')->name('upload_file_Food');
Route::get('update_Food', 'AdminController@update_Food')->name('update_Food');
Route::get('update_Clerk', 'AdminController@update_Clerk')->name('update_Clerk');
Route::get('update_Chef', 'AdminController@update_Chef')->name('update_Chef');

Route::post('adminn', 'AdminController@upload_file_Food')->name('adminn');

Route::get('get_Food', 'AdminController@get_Food')->name('get_Food');
Route::get('get_Clerk', 'AdminController@get_Clerk')->name('get_Clerk');
Route::get('get_Chef', 'AdminController@get_Chef')->name('get_Chef');
Route::get('get_Category', 'AdminController@get_Category')->name('get_Category');

Route::get('reveneu-in-range', 'AdminController@getReveneu_InRange')->name('getReveneu_InRange');

////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('get-all-book-by-cate', 'FoodController@getAllByCategory')->name('getAllByCategory');//bug

Route::get('get-all-book-by-author', 'FoodController@getAllByPrice')->name('getAllByPrice');//bug

Route::get('get-all-book-by-key', 'FoodController@getAllByKey')->name('getAllByKey');

Route::post('payment', 'FoodController@payment')->name('payment');

Route::get('food-order/{id}',[FoodOrder::class,'show'])->name('food-order.show');

Route::get('food-order',[FoodOrder::class,'index'])->name('food-order.index');

Route::get('food',[FoodController::class, 'index'])->name('food.index');

Route::put('food/{id}',[FoodController::class, 'update'])->name('food.update');











