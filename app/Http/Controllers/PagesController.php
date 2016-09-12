<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Http\Requests;

class PagesController extends Controller
{
	use TeamsPlayerIsOnTrait;

	public function index()
    {

    	if( \Auth::check())
    	{
    		$teams = $this->getTeamsUserIsOn( );

			$my_teams_listing_by_team_id = array( );
			foreach( $teams as $team )
			{
				$my_teams_listing_by_team_id[ ] = $team->team->team_id;
			}

    		$schedule = $this->getFullGameSchedule( $my_teams_listing_by_team_id );

    		return view('pages.home_logged_in', compact( 'schedule', 'my_teams_listing_by_team_id' ) );
    	}
        
        return view('pages.home');
    }

    public function getFullGameSchedule( $my_teams_listing_by_team_id ) 
	{

		$schedule = Game::whereIn( 'home_team_id', $my_teams_listing_by_team_id )
							->OrwhereIn( 'away_team_id', $my_teams_listing_by_team_id )
							->OrderBy( 'game_time' )
							->with( 'home_team', 'away_team', 'field' )
							->get( );

		return $schedule;
	}

}