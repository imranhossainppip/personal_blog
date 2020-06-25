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

//Tags Route Here--------------
Route::get('all_tags','TagController@all_tags')->name('all_tags');
Route::get('add_tag','TagController@add_tag')->name('add_tag');
Route::post('save_tag','TagController@save_tag')->name('save_tag');
Route::get('edit_tag/{id}','TagController@edit_tag')->name('edit_tag');
Route::get('delete_tag{id}','TagController@delete_tag')->name('delete_tag');
Route::post('update_tag{id}','TagController@update_tag')->name('update_tag');

//Post Route Here-----
Route::get('all_post','PostController@all_post')->name('all_post');
Route::get('add_post','PostController@add_post')->name('add_post');
Route::post('save_post','PostController@save_post')->name('save_post');
Route::get('edit_post/{id}','PostController@edit_post')->name('edit_post');
Route::post('update_post/{id}','PostController@update_post')->name('update_post');
Route::get('delete_post/{id}','PostController@delete_post')->name('delete_post');

