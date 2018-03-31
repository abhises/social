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

  

Route::group(['middleware'=>['web']],function(){

	 Route::get('/', [
	 	'uses'=>'UserController@welcome',
	 	'as'=>'welcome'
	 	]);

Route:: post('/signup',[
	'uses'=>'UserController@postSignUp',
	'as'=>'signup'

	]);
Route:: post('/signin',[
	'uses'=>'UserController@postSignIn',
	'as'=>'signin'

	]);

Route::get('/logout',[
	'uses'=>'UserController@logout',
	'as'=>'logout'

	]);
Route::get('/profile',[
 'uses'=>'UserController@profile',
 'as'=>'profile',
'middleware'=>'auth']);

Route::post('/image',[
'uses'=>'UserController@image',
'as'=>'image',
'middleware'=>'auth']);

Route::delete('/delete/{id}',[
'uses'=>'UserController@destroy',
'as'=>'destroy',
'middleware'=>'auth'
]);

Route::resource('post','PostController');


});