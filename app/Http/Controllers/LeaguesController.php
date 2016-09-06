<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\League;
use App\Http\Requests;
use App\Http\Requests\LeagueRequest;

class LeaguesController extends Controller
{
    public function index() 
	{
		$leagues = League::All();

		return view( 'leagues.index', compact( 'leagues' ) );
	}

	public function create() 
	{
		return view( 'leagues.create' );
	}

	public function store( LeagueRequest $request) 
	{
		$input = $request->all();

		$league = new League( );

		$league->name 		= $input[ 'name' ];
		$league->type 		= $input[ 'type' ];
		$league->active 	= $input[ 'active' ];

		$league->save( );

		return redirect('leagues');
	}

	public function destroy( $league_id ) 
	{
		#Remove Player from the Roster
		$league 			= League::find( $league_id );
		$league->delete();

		return redirect('leagues');
	}
}
