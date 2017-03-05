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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'Auth\LoginController@login');

});

Route::get('/home', 'Backend\HomeController@index');

Route::resource('/property', 'Backend\PropertyController');

Route::get('/property/record/{id}', [
    'as' => 'property.record',
    'uses' => 'Backend\PropertyController@record'
]);

Route::post('/transaction/save', [
    'as' => 'ajax',
    'uses' => 'Backend\TransactionController@store'
]);