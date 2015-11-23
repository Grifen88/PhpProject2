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

Route::get('home', 'MainController@main');
Route::get('main', 'MainController@main');
Route::get('search', 'MainController@search');

Route::get('searchresult', 'MainController@search_result');
Route::get('getallcabins', 'ReservationController@create_helper_cabin');
Route::get('getpassengerform', 'ReservationController@create_helper_passenger');
Route::get('getconfirmation', 'ReservationController@create_helper_confirmation');

Route::get('cruises', 'CruiseController@index');
Route::get('cruises/{id}', 'CruiseController@show');

Route::resource('reservation', 'ReservationController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//temporary place to put form macros
Form::macro('fancySelect', function($name, $list = array(), $selected = null, $options = array())
{
    $selected = $this->getValueAttribute($name, $selected);

    $options['id'] = $this->getIdAttribute($name, $options);

    if ( ! isset($options['name'])) $options['name'] = $name;

    $html = array();

    foreach ($list as $list_el)
    {
        $selected = $this->getSelectedValue($list_el['value'], $selected);
        $option_attr = array('value' => e($list_el['value']), 'selected' => $selected, 'class' => $list_el['class']);
        $html[] = '<option'.$this->html->attributes($option_attr).'>'.e($list_el['display']).'</option>';
    }

    $options = $this->html->attributes($options);

    $list = implode('', $html);

    return "<select{$options}>{$list}</select>";
});