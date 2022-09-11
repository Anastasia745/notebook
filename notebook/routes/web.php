<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/{id}', 'App\Http\Controllers\MainController@contact')->name('contact');
Route::get('/edit/{id}', 'App\Http\Controllers\MainController@contactEdit')->name('contact-edit');
Route::post('/update/{id}', 'App\Http\Controllers\MainController@contactUpdate')->name('contact-update');
Route::post('/add', 'App\Http\Controllers\MainController@contactAdd')->name('contact-add');
Route::delete('/remove/{id}', 'App\Http\Controllers\MainController@contactRemove')->name('contact-remove');
