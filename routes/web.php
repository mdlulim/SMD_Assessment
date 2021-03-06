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

// Route::get('/', function () {
//     return view('contact');
// });
Route::get('/', 'ContactController@index')->name('contact');
Route::post('/store', 'ContactController@store')->name('store');
Route::get('/users', 'ContactController@list')->name('users');
Auth::routes();


