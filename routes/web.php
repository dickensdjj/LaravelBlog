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

// entry point
Route::get('/', function () {
    return view('index');
});

// dashboard controller section
Route::get('/dashboard', 'DashboardController@index');

// post controller section
Route::get('/dashboard/posts/view', 'PostsController@index');
Route::get('/dashboard/post/create', 'PostsController@create');
Route::post('/dashboard/post', 'PostsController@store');
Route::get('/dashboard/post/view/{id}','PostsController@show')->name('view_post');
Route::get('/dashboard/post/view/{id}/edit', 'PostsController@edit');
Route::put('/dashboard/post/view/{id}','PostsController@update');
Route::delete('/dashboard/post/view/{id}/destroy', 'PostsController@destroy');

// Auth controller section
Auth::routes();