<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Routers for all the http based page requests
Route::group(array('prefix' => '/',), function() {
    Route::get('', 'PageController@showHome');
    Route::get('lorem-ipsum', 'PageController@showLoremIpsumGenerator');
    Route::get('user-generator', 'PageController@showUsersGenerator');
});

// Routers for all the http based api requests
Route::group(array('prefix' => '/api',), function() {
    Route::get('repo', 'ApiController@generateLoremIpsum');
    Route::get('item', 'ApiController@generateUser');
});
