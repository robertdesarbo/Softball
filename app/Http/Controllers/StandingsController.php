<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use Auth;
use App\Http\Requests;

class StandingsController extends Controller
{
	use TeamsPlayerIsOnTrait;

    public function index() 
	{
		$standings = $this->getMyTeamsStandings( );

		return view( 'standings.index', compact( 'standings' ) );
	}

    public function getMyTeamsStandings() 
	{
		$standings = array( (object) array( "position" => 1, "team_name" => 1, "wins" => 1, "loses" => 1, "games_behind" => 1 ) );

		return $standings;
	}

}
