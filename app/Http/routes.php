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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/create', function () {
    return view('auth/create');
});
//Route::resource('/store', function () {
//    return view('auth/store');
//});
Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/members', 'MemberController@index');
//Route::get('/create', 'UserController@create');
//Route::resource('/store', 'UserController@store');
//Route::resource('/test', 'TestController@method');
Route::get('/User_invitation_trip', 'User_invitation_tripController@index');
Route::get('/history', 'User_invitation_tripController@history');
//Route::get('/show', 'User_invitation_tripController@history');

//webservice
Route::post('/members/updateStatus_ws', 'MemberController@updateStatus_ws');
Route::post('/User_invitation_trip/show_ws', 'User_invitation_tripController@show_ws');
Route::post('/User_invitation_trip/history_ws', 'User_invitation_tripController@history_ws');
Route::post('/User_invitation_trip/create_ws', 'User_invitation_tripController@create_ws');


Route::post('/members/create', 'MemberController@create');
Route::post('/members/show', 'MemberController@show');
Route::post('/members/update', 'MemberController@update');


Route::post('/trips/{ area }', 'TripController@trip_day');
//Route::get('/trips/month', 'TripController@trip_month');
