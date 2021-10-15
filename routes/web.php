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

Route::prefix('bills')->group(function () {
    Route::get('/', 'BillController@index')->name('bills.index');
    Route::get('/create', 'BillController@create')->name('bills.create');
    Route::post('/', 'BillController@store')->name('bills.store');
    Route::get('/{bill}', 'BillController@show')->name('bills.show');
    Route::get('/{bill}/edit', 'BillController@edit')->name('bills.edit');
    Route::put('/{bill}', 'BillController@update')->name('bills.update');
    Route::delete('/{bill}', 'BillController@destroy')->name('bills.destroy');
});

Route::prefix('users')->group(function () {
    Route::get('/', 'DefaultController@users')->name('users.index');
    Route::get('/create', 'DefaultController@create')->name('users.create');
    Route::post('/', 'DefaultController@store')->name('users.store');
    Route::get('/{user}', 'DefaultController@show')->name('users.show');
    Route::get('/{user}/delete', 'DefaultController@userDelete')->name('users.destroy');
    Route::get('/{user}/edit', 'DefaultController@edit')->name('users.edit');
    Route::put('/{user}', 'DefaultController@update')->name('users.update');
});
