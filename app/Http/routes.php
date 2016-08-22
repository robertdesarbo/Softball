<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get( '/', 'PagesController@index' );

Route::resource( 'leagues', 'LeaguesController' );

Route::resource( 'teams', 'TeamsController' );

Route::resource( 'players', 'PlayersController' );
Route::post( 'players', 'PlayersController@search' );

Route::resource( 'umpires', 'UmpiresController' );

Route::resource( 'fields', 'FieldsController' );

Route::auth();
