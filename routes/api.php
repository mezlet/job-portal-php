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
Route::group([], function() {
    Route::post('gigs', 'GigsController@create');
    Route::get('gigs', 'GigsController@getAll');
    Route::put('gigs/{id}/edit', 'GigsController@update');
    Route::delete('gigs/{id}', 'GigsController@delete');
});
