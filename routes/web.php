<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts', 'pagesController@posts')->name('Posts');
Route::get('/posts/{post}', 'pagesController@post')->name('Post');
Route::post('/posts/{post}/store', 'commentsController@store')->name('Add_Comment');
Route::get('/category/{name}', 'pagesController@category')->name('Category');
Route::get('/about', 'pagesController@about')->name('About');
Route::get('/contact','pagesController@contact')->name('Contact');
Route::post('/contact','pagesController@send')->name('Send');




Route::get('/', function(){
	return redirect()->to('/posts');    //idea
});


Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function(){

	Route::get('/admin', 'pagesController@admin')->name('Admin');
	Route::post('/add_role', 'pagesController@addRole')->name('Add_role');
	Route::post('/settings', 'pagesController@settings')->name('Settings');	
	Route::post('/category/store', 'pagesController@storeCategory')->name('StoreCategory');	

});

Route::group(['middleware' => 'roles', 'roles' => ['Admin','Editor']], function(){

	Route::post('/posts/store', 'pagesController@store')->name('Add_Post');
	Route::get('/posts/{post}/edit', 'pagesController@edit')->name('Edit');
	Route::post('/posts/{post}/update', 'pagesController@update')->name('Update');
	Route::delete('/posts/{post}/destroy', 'pagesController@destroy')->name('Destroy');
		
});



Route::get('/access_denied', 'pagesController@accessDenied')->name('AccessDenied');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics', 'pagesController@statistics')->name('Statistics');

Route::get('/search', 'pagesController@search')->name('Search');

