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

// Route::get('/', function () {
//     return view('layout.layout');
// });

Route::get('/', 'HomeController@index')->name('index');
Route::get('data', ['as' => 'data', 'uses' => 'TrackingController@getData']);
Route::get('upload', 'UploadController@index')->name('upload');
Route::post('file', ['as' => 'file', 'uses' => 'UploadController@simpan']);
Route::get('tracking', 'TrackingController@index')->name('tracking');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
