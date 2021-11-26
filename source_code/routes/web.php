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

Route::post('food-order',[FoodOrder::class,'store'])->name('food-order.store');

Route::get('food',[FoodController::class, 'index'])->name('food.index');

Route::post('food/{id}',[FoodController::class, 'update'])->name('food.update');

Route::put('food-order/{id}',[FoodOrder::class,'update'])->name('food-order.update');

Route::get('ajax', [FoodOrder::class, 'getOrder'])->name('get_order');

Route::get('ajax/order', [FoodOrder::class, 'getRequest'])->name('get_requests');

Route::get('finish-order', [FoodOrder::class, 'finish_order'])->name('finished_order');

Route::get('doing-order', [FoodOrder::class, 'doing_order'])->name('doing_order');

Route::get('noname',[FoodOrder::class,'setTips'])->name('setTips');

Route::get('/clerk', [App\Http\Controllers\ClerkController::class, 'index'])->name('clerk');

Route::get('/get-clerk', [App\Http\Controllers\ClerkController::class, 'getClerk'])->name('get_clerk');

Route::get('/chat/{id}', [App\Http\Controllers\ClerkController::class, 'chat_box'])->name('chat_box');

Route::get('clerk/chat/insert', [App\Http\Controllers\ClerkController::class, 'sendMessage'])->name('send_message');

Route::get('clerk/chat', [App\Http\Controllers\ClerkController::class, 'getMessage'])->name('get_message');

Route::get('clerk/profile', [App\Http\Controllers\ClerkController::class, 'profile']);

Route::get('clerk/order/waiting', [App\Http\Controllers\ClerkController::class, 'getWaitingOrder'])->name('get_waiting_order');

Route::get('clerk/order/pending', [App\Http\Controllers\ClerkController::class, 'getPendingOrder'])->name('get_pending_order');

Route::get('clerk/order/detail', [App\Http\Controllers\ClerkController::class, 'getOrderDetail'])->name('get_order_detail');

Route::get('clerk/order/confirm', [App\Http\Controllers\ClerkController::class, 'confirmOrder'])->name('confirm_order');
Route::get('clerk/order/delete', [App\Http\Controllers\ClerkController::class, 'deleteOrder'])->name('delete_order');
Route::post('deleteOrder/{id}', [FoodOrder::class, 'deleteOrder'])->name('deleteOrder');
Route::get('clerk/order/finish', [App\Http\Controllers\ClerkController::class, 'finishOrder'])->name('finish_order');
Route::post('updateStatus/{id}',[FoodOrder::class, 'updateStatus'])->name('updateStatus');










