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

//Property

Route::resource('/property', 'Backend\PropertyController');

Route::get('/property/record/{id}', [
    'as' => 'property.record',
    'uses' => 'Backend\PropertyController@record'
]);

Route::get('/property/record/edit/{transaction}', 'Backend\PropertyController@editRecord')->name('property.record.edit');
Route::patch('/property/record/update/{transaction}', 'Backend\PropertyController@updateRecord')->name('property.record.update');


//Transaction

Route::post('/transaction/save', [
    'as' => 'ajax',
    'uses' => 'Backend\TransactionController@store'
]);

//Category

Route::get('/category', [
    'as' => 'category.record',
    'uses' => 'Backend\CategoryController@index'
]);

Route::post('/category/add', [
    'as' => 'category.store',
    'uses' => 'Backend\CategoryController@store'
]);

//Chart
Route::get('/chart/getChartData/{id}', [
    'as' => 'chart.data',
    'uses' => 'Backend\ChartController@getChartData'
]);