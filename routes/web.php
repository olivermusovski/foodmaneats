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

//Auth
Auth::routes();
Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Auth\LoginController@logout']);

//Pages
Route::get('/', 'PagesController@getIndex');
//Commented out about page because not necessary at this time
//Route::get('about', 'PagesController@getAbout');
//Commented out contacts page because not using at this time
//Route::get('contact', 'PagesController@getContact');
//Route::post('contact', 'PagesController@postContact');

//Blog
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

//Posts
Route::resource('posts', 'PostController');

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
