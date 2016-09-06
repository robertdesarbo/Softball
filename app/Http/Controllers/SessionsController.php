<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Session;
use App\Http\Requests;
use App\Http\Requests\SessionRequest;

class SessionsController extends Controller
{
    public function show( $league_id, $division_id ) 
	{
		$sessions = Session::where( 'division_id', $division_id )->with( 'division' )->get( );

		$division_name = "";
		if( count( $sessions ) > 0 )
		{
			$division_name = $sessions[ 0 ]->division->name;
		}

		return view( 'sessions.show', compact( 'league_id', 'division_id', 'division_name', 'sessions' ) );
	}

	public function create( $league_id, $division_id )
	{
		return view( 'sessions.create', compact( 'league_id', 'division_id' ) );
	}

	public function store( $league_id, $division_id, SessionRequest $request ) 
	{
		$input = $request->all();

		$session = new Session( );

		$session->division_id 	= $division_id;
		$session->start_date 	= $input[ 'start_date' ];
		$session->end_date 		= $input[ 'end_date' ];
		$session->active 		= $input[ 'active' ];

		$session->save( );

		return redirect( 'sessions/'.$league_id.'/'.$division_id );
	}

	public function destroy( $league_id, $division_id, $session_id ) 
	{
		#Remove Player from the Roster
		$session 			= Session::find( $session_id );
		$session->delete();

		return redirect( 'sessions/'.$league_id.'/'.$division_id );
	}
}
