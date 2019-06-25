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

Route::get('/','PostsController@index' );
Route::get('/about','PagesController@about');
Route::get('/search','PagesController@search');
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('comments', 'CommentsController');

Route::resource('likes','LikesController');

Route::get('lang/{locale}','LanguageController');
Route::get('/posts/search','PostsController@getSearch');
Route::post('/posts/search','PostsController@postSearch');