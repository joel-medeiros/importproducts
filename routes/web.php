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

Route::group(['prefix' => 'products'], function(){
    Route::get('', 'ProductController@index')->name('products.index');

    Route::post('import', 'ProductController@import')->name('products.import');
    Route::get('{id}/show', 'ProductController@show')->name('products.show');

    Route::put('{id}/save', 'ProductController@update')->name('products.save');
    Route::get('{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('{id}/active', 'ProductController@active')->name('products.active');
    Route::delete('{id}/inactive', 'ProductController@destroy')->name('products.inactive');
});