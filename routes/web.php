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
    return redirect()->to('/login');
});
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('/register','Auth\RegisterController@showRegistrationForm');
Route::post('register','Auth\RegisterController@register')->name('register');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token} ','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');
Auth::routes();
Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	//Change Password
	Route::get('/change_password','Auth\ChangePasswordController@showForm')->middleware('google_account');
	Route::post('/change','Auth\ChangePasswordController@change')->name('password.change');
	//Profile
	Route::get('/{user}/profile','ProfileController@index')->name('users.profile');
	Route::patch('/{user}/profile/edit','ProfileController@editProfile')->name('profiles.edit');
	Route::post('/{user}/profilepicture/change','ProfileController@changeAvatar')->name('profiles.change_avatar');
	Route::post('/{user}/collections/add','ProfileController@addCollection')->name('profiles.collection');
	Route::delete('/{user}/collections/delete','ProfileController@deleteCollection')->name('profiles.delete');
	// User Management
	Route::resource('/users','Admin\UserController');
	Route::resource('/roles','Admin\RoleController');
	Route::resource('/permissions','Admin\PermissionController');


	Route::post('logout','Auth\LoginController@logout');
});
