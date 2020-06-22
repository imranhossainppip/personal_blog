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
Route::get('/home','AdminController@index');
