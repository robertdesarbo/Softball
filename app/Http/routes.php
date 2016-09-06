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

Route::delete( 'divisions/{league_id}/{division_id}', 'DivisionsController@destroy' )->name( 'divisions.destroy' );
Route::get( 'divisions/{league_id}/create', 'DivisionsController@create' )->name( 'divisions.create' );
Route::post( 'divisions/{league_id}', 'DivisionsController@store' )->name( 'divisions.store' );
Route::resource( 'divisions', 'DivisionsController' );

Route::get( 'sessions/{league_id}/{division_id}/', 'SessionsController@show' )->name( 'sessions.show' );
Route::delete( 'sessions/{league_id}/{division_id}/{session_id}', 'SessionsController@destroy' )->name( 'sessions.destroy' );
Route::get( 'sessions/{league_id}/{division_id}/create', 'SessionsController@create' )->name( 'sessions.create' );
Route::post( 'sessions/{league_id}/{division_id}/', 'SessionsController@store' )->name( 'sessions.store' );
Route::resource( 'sessions', 'SessionsController' );

Route::resource( 'schedule', 'ScheduleController' );

Route::get( 'teams/list_team', 'TeamsController@listTeams_index' )->name( 'teams.list_team' );
Route::post( 'teams/list_team', 'TeamsController@listTeams' )->name( 'teams.list_team' );
Route::get( 'teams/join/{team_id}', 'TeamsController@joinTeam' )->name( 'teams.join' );
Route::get( 'teams/remove/{team_id}', 'TeamsController@removeTeam' )->name( 'teams.remove' );

Route::get( 'teams/create_team', 'TeamsController@createTeams' )->name( 'teams.create_team' );

Route::resource( 'teams', 'TeamsController' );

#Route::resource( 'users', 'UsersController' );
#Route::post( 'users', 'UsersController@search' );

Route::resource( 'standings', 'StandingsController' );

Route::resource( 'umpires', 'UmpiresController' );

Route::resource( 'fields', 'FieldsController' );

#AJAX
Route::get( '/ajax-divisions_in_league/{league_id}', function( $league_id )
{
	$divisions = App\Division::where( 'league_id', $league_id )->get( );

	return Response::json( $divisions );
} );

Route::get( '/ajax-sessions_in_division/{division_id}', function( $division_id )
{
	$sessions = App\Session::where( 'division_id', $division_id )
		->select( 'sessions.session_id', DB::raw( 'DATE_FORMAT(start_date, "%M %Y") as MY_start_date' ) )
		->get( );

	return Response::json( $sessions );
} );

Route::auth();
