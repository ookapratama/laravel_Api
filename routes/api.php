<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', 'UserController@index')->name('index');
    Route::get('/edit/{id}', 'UserController@edit')->name('edit');
    Route::post('/store', 'UserController@store')->name('store');
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::get('/destroy/{id}', 'UserController@destroy')->name('destroy');


});