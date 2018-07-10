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

Route::get('/', 'Comunicaty\ProductController@index')->name('comunicaty.product');
Route::get('/product/edit/{id}', 'Comunicaty\ProductController@edit')->name('comunicaty.product.edit');
Route::delete('/product/delete/{id}', 'Comunicaty\ProductController@destroy')->name('comunicaty.product.delete');
