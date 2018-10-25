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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {
    Route::resource('/sentences', 'SentenceController');
    
    Route::get('/parameters', 'ParameterController@index')->name('parameters');
    Route::put('/parameters', 'ParameterController@update')->name('parameters.update');
    Route::put('/parameters/password', 'ParameterController@updatePassword')->name('parameters.password');


    // Admin
    Route::resource('/users', 'UserController')->middleware('admin');
    Route::resource('/admins', 'AdminController')->middleware('admin');
});

Route::fallback('HomeController@index')->name('fallback');

