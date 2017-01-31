<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Routes for all Users
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+'); /* Blog Slug Route */
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::get('/admin', 'AdminController@getIndex');
Auth::routes();

Route::post('contact', 'PagesController@postContact');

// Routes for Authenticated Users
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/posts', 'PostController');
});