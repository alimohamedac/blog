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
Route::post('/posts/store', 'pagesController@store')->name('Add_Post');
Route::post('/posts/{post}/store', 'commentsController@store')->name('Add_Comment');
Route::get('/category/{name}', 'pagesController@category')->name('Category');

Route::get('/', function(){
	return redirect()->to('/posts');    //idea
});


Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function(){
	
	Route::get('/admin', 'pagesController@admin')->name('Admin');
	Route::get('/add_role', 'pagesController@addRole')->name('Add_role');

});


Route::get('/editor', [
	'uses' => 'pagesController@editor',
	'as' => 'pages.editor',
	'middleware' => 'roles',
	'roles' => ['Admin','Editor']
]);

Route::get('/access_denied', 'pagesController@accessDenied')->name('AccessDenied');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
