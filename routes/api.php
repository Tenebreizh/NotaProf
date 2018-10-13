<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Appreciations routes
Route::get('appreciations', 'AppreciationController@index'); //All appreciations
// Route::post('appreciations', 'AppreciationController@store'); //Create appreciation
Route::get('appreciations/{id}', 'AppreciationController@show'); //Show specific appreciation
// Route::put('appreciations/{id}', 'AppreciationController@update'); //Update specific appreciation
// Route::delete('appreciations/{id}', 'AppreciationController@update'); //Delete specific appreciation

// Categories routes
Route::get('categories', 'CategoryController@index'); //All categories
// Route::post('categories', 'CategoryController@store'); //Create category
Route::get('categories/{id}', 'CategoryController@show'); //Show specific category
// Route::put('categories/{id}', 'CategoryController@update'); //Update specific category
// Route::delete('categories/{id}', 'CategoryController@destroy'); //Delete specific category
