<?php

namespace App\Http\Controllers;

Use Request;

use Auth;

use App\League;
use App\Team;
use App\TeamRoster;

use App\Http\Requests\TeamSearchRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Requests;

class TeamsController extends Controller
{
	use TeamsPlayerIsOnTrait;

    public function index() 
	{
		$teams = $this->getTeamsUserIsOn( );

		return view( 'teams.index', compact( 'teams' ) );
	}

	public function show() 
	{
		$teams = null;
		
		return view( 'teams.index', compact( 'teams' ) );
	}

	public function createTeams() 
	{
		$leagues = $this->getAllActiveLeagues( );
		$leagues->prepend( 'Choose One', '' );

		return view( 'teams.create', compact( 'leagues' ) );
	}

	public function joinTeam( $team_id ) 
	{
		#Add Player to the Roster
		$teamRoster 			= new TeamRoster;

		$teamRoster->team_id 	= $team_id;
		$teamRoster->user_id 	= Auth::user()->user_id;
		$teamRoster->active 	= 1;
		$teamRoster->captain 	= 0;

		$teamRoster->save();

		return redirect('teams');
	}

	public function destroy( $teamroster_id ) 
	{
		#Remove Player from the Roster
		$teamRoster 			= TeamRoster::find( $teamroster_id );
		$teamRoster->delete();

		return redirect('teams');
	}


	public function listTeams_index( ) 
	{
		$teams = null;

		return view( 'teams.list', compact( 'teams' ) );
	}

	public function listTeams(TeamSearchRequest $request) 
	{
		#Form inputs
		$input = $request->all();

		$teams = Team::where( 'name', 'LIKE', '%'.$input[ 'name' ].'%')
					->with(  array( 'teamroster' => function($query)
						{
			     			$query->where( 'captain', 1 )->with( 'user' );
						}))
					->get( );

		return view( 'teams.list', compact( 'teams' ) );
	}

	public function store(TeamRequest $request)  
	{
		#Form inputs
		$input = $request->all();

		#Add Team
		$team = new Team;

		$team->session_id 	= $input[ 'session_id' ];
		$team->name 		= $input[ 'name' ];

		$team->save();

		#Add Player to the Roster
		$teamRoster = new TeamRoster;

		$teamRoster->team_id 	= $team->team_id;
		$teamRoster->user_id 	= Auth::user()->user_id;
		$teamRoster->active 	= 1;
		$teamRoster->captain 	= 1;

		$teamRoster->save();

		return redirect( 'teams' );
	}

	public function getAllActiveLeagues() 
	{
		return League::where( 'active', 1 )->lists('name', 'league_id');
	}

}
