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

Route::middleware(['auth'])->group(function () {
    Route::resource('/sentences', 'SentenceController');

    Route::resource('/classes', 'ClassController')->only(['index', 'store', 'update', 'destroy']);

    Route::get('/parameters', 'ParameterController@index')->name('parameters');
    Route::put('/parameters', 'ParameterController@update')->name('parameters.update');
    Route::put('/parameters/password', 'ParameterController@updatePassword')->name('parameters.password');

    // Admin
    Route::resource('/users', 'UserController')->middleware('admin');
    Route::resource('/admins', 'AdminController')->middleware('admin');

    Route::get('/administration', 'AdministrationController@index')->name('administration.index');

    // Appreciations admin
    Route::get('/administration/resetAppreciations', 'AppreciationController@reset')->name('appreciations.reset');
    Route::put('/appreciations/{appreciation}', 'AppreciationController@update')->name('appreciations.update');
    Route::delete('/appreciations/{appreciation}', 'AppreciationController@destroy')->name('appreciations.destroy');
});

Route::fallback('HomeController@index')->name('fallback');
