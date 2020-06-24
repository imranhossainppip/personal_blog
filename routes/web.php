<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Front Route Here----------
Route::get('/','FrontController@index');
Route::get('/about','FrontController@about');
Route::get('/category','FrontController@category');
Route::get('/contact','FrontController@contact');
Route::get('/single','FrontController@single');

//Admin Route Here----------
Route::get('/home','AdminController@index');
Route::resource('category','CategoryController');
Route::get('/category_view/{id}','CategoryController@category_view')->name('category_view');
Route::get('category_edit/{id}','CategoryController@category_edit')->name('category_edit');
Route::get('category_destroy/{id}','CategoryController@category_destroy')->name('category_destroy');
Route::post('category_update/{id}','CategoryController@category_update');

