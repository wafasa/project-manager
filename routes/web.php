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
    return redirect('/dashboard');
});

Auth::routes(['verify' => false]);


// Public Routes
Route::group(['middleware' => ['web']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'HomeController@dashboard')->name("dashboard");

    // Socialite Register Routes
    Route::get('/login/redirect/{provider}', 'Auth\SocialController@getSocialRedirect')->name('social.redirect');
    Route::get('/login/handle/{provider}', 'Auth\SocialController@getSocialHandle')->name('social.handle');
});