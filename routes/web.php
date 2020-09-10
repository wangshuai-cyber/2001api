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
    return view('welcome');
});
Route::get('/login','Login\LoginController@login');
//Route::any('new/index','New\NewController@index');
Route::any('/news','News\NewsController@news');
Route::any('/login_do','Login\LoginController@login_do');

Route::get('brand/create','Admin\BrandController@create');
Route::post('brand/store','Admin\BrandController@store');
Route::get('/brand/show','Admin\BrandController@index');
Route::post('brand/upload','Admin\BrandController@upload');
Route::get('/brand/destroy/{brand_id?}','Admin\BrandController@destroy');
Route::get('/brand/edit/{brand_id}','Admin\BrandController@edit');
Route::post('/brand/update/{brand_id}','Admin\BrandController@update');
Route::get('/brand/change',"Admin\BrandController@change");