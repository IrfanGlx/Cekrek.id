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

Route::get('/beranda', 'UsersController@index')->name('index');
Route::get('/post', 'UsersController@upload')->name('upload');
Route::get('/mygallery', 'UsersController@mygallery')->name('mygallery');
Route::get('/photo/{id}', 'UsersController@post')->name('post');
Route::get('/user/{by}', 'UsersController@userGallery')->name('user');
Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
Route::get('/editprofile', 'UsersController@editProfile')->name('editprofile');

Route::post('/editaction', 'UsersController@editProfileAction')->name('editAction');
Route::post('/postaction', 'UsersController@uploadAction')->name('uploadaction');
Route::post('/commentaction', 'UsersController@commentAction')->name('commentaction');
Route::post('/deletepost', 'UsersController@deletePost')->name('deletePost');
Route::post('/editprofileaction', 'UsersController@editProfileAction')->name('editProfileAction');
Route::post('/follow', 'UsersController@followAction')->name('followAction');
Route::post('/unfollow', 'UsersController@unfollowAction')->name('unfollowAction');