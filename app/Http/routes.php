<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@main');

Route::get('contact', function() {
	return view('contact');
});

Route::get('main', 'MainController@main');
Route::get('search', 'MainController@search');

Route::get('searchresult', 'MainController@search_result');
Route::get('getallcabins', 'ReservationController@create_helper_cabin');
Route::get('getpassengerform', 'ReservationController@create_helper_passenger');

Route::get('cruises', 'CruiseController@index');
Route::get('cruises/{id}', 'CruiseController@show');

Route::resource('reservation', 'ReservationController');