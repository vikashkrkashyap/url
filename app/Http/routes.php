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
//login and registration routes
Route::post('test','DemoController@test');

Route::get('login', [
    'uses' =>'Auth\AuthController@getLogin',
    'as'   => 'login']);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

//dashboard
Route::get('dashboard',[
    'uses' => 'UserController@showDashboard',
     'as'  => 'dashboard']);
Route::get('foo','UserController@demo');
//url generator route

Route::get('/',[
    'uses' =>'UrlController@index',
     'as'  =>'home']);
Route::post('show','UrlController@show');

Route::get('/{key}','UrlController@hash');

//after login

Route::post('postAjaxData','UserController@postUrl');

Route::get('dashboard/{id}','UserController@getHits');
Route::get('analytics/1','UserController@getAnalytics');

//Api Routes

Route::group(['prefix'=>'api/v1'] ,function(){

    Route::resource('dashboard','API\DashboardController');
});