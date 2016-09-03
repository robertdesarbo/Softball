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
		$teams = $this->getTeamsUserIsOn( );

		return view( 'teams.index', compact( 'teams' ) );
	}

	public function show() 
	{
		$teams = null;
		
		return view( 'teams.index', compact( 'teams' ) );
	}

	public function getTeamsUserIsOn( )
	{
		$teams = Auth::user()
					->teamroster()
					->where( 'active', '1' )
					->with( array( 'team' => function($query)
						{
			     			$query->with( array( 'division' => function($query)
							{
				     			$query->with( 'league' );
							}));
						}))
					->get();

		return $teams;
	}


}