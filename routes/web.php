<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'DefaultController@home')->name('home');
Route::get('/stats', 'DefaultController@stats')->name('stats');

Route::prefix('bills')->group(function () {
    Route::get('/', 'BillController@index')->name('bills.index');
    Route::get('/create', 'BillController@create')->name('bills.create');
    Route::get('/pay', 'BillController@pay')->name('bills.pay');
    Route::get('/unpaid', 'BillController@unpaid')->name('bills.unpaid');
    Route::post('/', 'BillController@store')->name('bills.store');
    Route::get('/{user}', 'BillController@show')->name('bills.show');
    Route::get('/{user}/bill', 'BillController@bill')->name('bills.user');
    Route::get('/{bill}/delete', 'BillController@delete')->name('bills.delete');
    Route::get('/{bill}/edit', 'BillController@edit')->name('bills.edit');
    Route::put('/{bill}', 'BillController@update')->name('bills.update');
});

Route::prefix('payments')->group(function () {
    Route::get('/', 'PaymentController@index')->name('payments.index');
    Route::get('/create', 'PaymentController@create')->name('payments.create');
    Route::post('/', 'PaymentController@store')->name('payments.store');
    Route::get('/{user}', 'PaymentController@show')->name('payments.show');
    Route::get('/{user}/bill', 'PaymentController@bill')->name('payments.user');
    Route::get('/{bill}/delete', 'PaymentController@delete')->name('payments.delete');
    Route::get('/{bill}/edit', 'PaymentController@edit')->name('payments.edit');
    Route::put('/{bill}', 'PaymentController@update')->name('payments.update');
});

Route::prefix('users')->group(function () {
    Route::get('/', 'DefaultController@users')->name('users.index');
    Route::get('/clients', 'DefaultController@clients')->name('users.clients');
    Route::get('/create', 'DefaultController@create')->name('users.create');
    Route::post('/', 'DefaultController@store')->name('users.store');
    Route::get('/{user}', 'DefaultController@show')->name('users.show');
    Route::get('/{user}/delete', 'DefaultController@userDelete')->name('users.delete');
    Route::get('/{user}/edit', 'DefaultController@userEdit')->name('users.edit');
    Route::put('/{user}', 'DefaultController@userUpdate')->name('users.update');
});
