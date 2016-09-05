<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Http\Requests;

class ScheduleController extends Controller
{
    use TeamsPlayerIsOnTrait;

    public function index() 
	{
		$teams = $this->getTeamsUserIsOn( );

		$teams = $this->getGameSchedule( $teams );

		return view( 'schedule.index', compact( 'teams' ) );
	}

	public function getGameSchedule( $teams ) 
	{
		$games = array( );
		foreach( $teams as $team )
		{
			$games[ $team->team->team_id ] = 
				array( 
					"name" 	=> $team->team->name,
					"games" => Game::where( 'home_team_id', $team->team->team_id )
							->Orwhere( 'away_team_id', $team->team->team_id )
							->OrderBy( 'game_time' )
							->with( 'home_team', 'away_team', 'field' )
							->get( )
				);
		}
		
		return $games;
	}
}
