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

Route::prefix('bills')->group(function() {
    Route::get('/', 'BillController@index')->profile('bills.index');
    Route::get('/create', 'BillController@create')->profile('bills.create');
    Route::post('/', 'BillController@store')->profile('bills.store');
    Route::get('/{bill}', 'BillController@show')->profile('bills.show');
    Route::get('/{bill}/edit', 'BillController@edit')->profile('bills.edit');
    Route::put('/{bill}', 'BillController@update')->profile('bills.update');
    Route::delete('/{bill}', 'BillController@destroy')->profile('bills.destroy');
});
