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



Route::get('/', 'EventsController@index');

Route::resource('/', 'EventsController');
Route::resource('events', 'EventsController');
//Route::get('events', 'EventsController@index');
//Route::get('events.show?title={id}', 'EventsController@show')->name('events.show');
//Route::get('events.destroy', 'EventsController@destroy')->name('events.destroy');
//Route::get('events.create', 'EventsController@create')->name('events.create');
Route::get('events.top', 'EventsController@top')->name('events.top');
Route::get('events.profile', 'EventsController@profile')->name('events.profile');

Route::get('signup.get', 'EventsController@index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Route::get('events/{id}', 'MemberController@unsanka')->name('member.unsanka');
Route::post('events/{id}', 'MemberController@sanka')->name('member.sanka');


Route::get('food', 'FoodController@index')->name('food.index');
Route::post('food.store', 'FoodController@store')->name('food.store');
Route::get('food.match', 'FoodController@match')->name('food.match');

Route::resource('users', 'MemberController', ['only' => ['index', 'show']]);