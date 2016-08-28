<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TeamRoster;
use Auth;

use App\Http\Requests;

class TeamsController extends Controller
{
    public function index() 
	{
		$teams = $this->getTeamsPlayerIsOn( );

		return view( 'teams.index', compact( 'teams' ) );
	}

	public function show() 
	{
		$teams = null;
		
		return view( 'teams.index', compact( 'teams' ) );
	}

	public function getTeamsPlayerIsOn( )
	{
		$teams = Auth::user()->player->teamroster->where( 'active', '1' );

		return $teams;
	}


}

#TeamRoster -> Player -> User

#Team -> Player -> User