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
    Route::get('/', 'BillController@index')->name('bills.index');
    Route::get('/create', 'BillController@create')->name('bills.create');
    Route::post('/', 'BillController@store')->name('bills.store');
    Route::get('/{bill}', 'BillController@show')->name('bills.show');
    Route::get('/{bill}/edit', 'BillController@edit')->name('bills.edit');
    Route::put('/{bill}', 'BillController@update')->name('bills.update');
    Route::delete('/{bill}', 'BillController@destroy')->name('bills.destroy');
});
