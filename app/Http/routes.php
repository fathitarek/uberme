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
Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/members', 'MemberController@index');
Route::get('/User_invitation_trip', 'User_invitation_tripController@index');
Route::get('/history', 'User_invitation_tripController@history');
//Route::get('/show', 'User_invitation_tripController@history');
