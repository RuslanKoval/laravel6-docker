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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('rest', 'RestTestController')->names('test');


Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function () {
    Route::resource('categories', 'CategoryController')->names('blog.admin.categories');
});

Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function () {
    Route::resource('posts', 'PostController')->except(['show'])->names('blog.admin.posts')->middleware('test');
});

Route::group(['prefix' => 'collection'], function () {
    Route::get('/', 'TestCollectionController@collection')->name('collection');
});

Route::group(['prefix' => 'queue'], function () {
    Route::get('/', 'QueueController@queue')->name('queue');
});


Route::get('/di', 'TestDI\DiController@store')->name('di');
