<?php

namespace App\Http\Controllers;

Use App\Session;
Use App\Game;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Http\Requests;

class StandingsController extends Controller
{
	use TeamsPlayerIsOnTrait;

    public function index() 
	{
		$standings = $this->getAllMyTeamsStandings( );

		return view( 'standings.index', compact( 'standings' ) );
	}

    public function getAllMyTeamsStandings() 
	{
		$myTeams = $this->getTeamsUserIsOn( );

		$sessionsWithTeams = $this->getAllTeamsInSession( $myTeams );

		$standings = array( );

		#Loop Sessions
		foreach( $sessionsWithTeams as $session )
		{

			$standings[ $session->session_id ] = array( "division_name" => $session->division->name, "start_date" => Carbon::parse($session->start_date)->format('M Y') );

			#Loop Teams in the Session
			foreach( $session->team as $team )
			{
				$stats = $this->getTeamsStatsForSession( $session->session_id, $team );

				$standings[ $session->session_id ][ 'teams' ][ ] = array( "name" => $team->name, "wins" => $stats[ 'wins' ], "loses" => $stats[ 'loses' ], "ties" => $stats[ 'ties' ], "games_played" => $stats[ 'games_played' ] );
			}

			#Sort most wins to the top, then by least loses, then by most ties
			usort($standings[ $session->session_id ][ 'teams' ], function ($item1, $item2)
			{
				if ($item2['wins'] == $item1['wins']) 
				{
					if ($item2['loses'] == $item1['loses']) 
					{
						return $item2['ties'] <=> $item1['ties'];
					}
					else
					{
						return $item1['loses'] <=> $item2['loses'];
					}
			        
			    }
			    else
			    {
			    	return $item2['wins'] <=> $item1['wins'];
			    }
			});
		}

		return $standings;
	}

	public function getAllTeamsInSession( $myTeams ) 
	{
		$divisions = array( );
		foreach( $myTeams as $team )
		{
			$sessions[] = $team->team->session->session_id;
		}

		#Grab All Teams in each division
		$teamsInSession = Session::whereIn( 'session_id', $sessions )->with( 'team', 'division' )->get( );

		return $teamsInSession;
	}

	public function getTeamsStatsForSession( $sessionID, $team ) 
	{


		$gamesPlayed = Game::where( 'session_id', '=', $sessionID )->whereNotNull( 'score_recored_time' )
			->where( function ($query) use ( $team )
			{
			    $query->where( 'home_team_id', '=', $team->team_id )
			          ->orWhere('away_team_id', '=', $team->team_id );
			} )->get( );


		$stats = array( 'wins' => 0, 'loses' => 0, 'ties' => 0, 'games_played' => 0 );
		foreach( $gamesPlayed as $game )
		{
			$stats[ 'games_played' ]++;

			#Home Win
			if( $game->home_team_id == $team->team_id && $game->home_team_score > $game->away_team_score )
			{
				$stats[ 'wins' ]++;
			}
			#Away Win
			else if( $game->away_team_id == $team->team_id && $game->away_team_score > $game->home_team_score )
			{
				$stats[ 'wins' ]++;
			}
			#Ties
			else if( $game->away_team_score == $game->home_team_score )
			{
				$stats[ 'ties' ]++;
			}
			#Lose
			else
			{
				$stats[ 'loses' ]++;
			}

		}

		return $stats;
	}
}
