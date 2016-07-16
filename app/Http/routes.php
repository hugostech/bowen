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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/dashboard', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/management', 'AdminController@index');
Route::get('/clientmanage', 'AdminController@clientManage');
Route::get('/servicemanage', 'AdminController@serviceManage');
Route::get('/delservice/{id}', 'AdminController@delservice');
Route::get('/addservice','AdminController@addService');


Route::post('/services', 'HomeController@serviceTemSave');
Route::post('/services2', 'HomeController@serviceTimeArrange');
Route::post('/confirmService', 'HomeController@confirmService');

Route::post('/service_edit','AdminController@service_edit');



//Route::get('/dashboard','')