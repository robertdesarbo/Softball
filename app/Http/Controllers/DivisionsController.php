<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Division;
use App\Http\Requests;
use App\Http\Requests\DivisionRequest;

class DivisionsController extends Controller
{
    public function show( $league_id ) 
	{
		$divisions = Division::where( 'league_id', $league_id )->with( 'league' )->get( );

		$league_name = $divisions[ 0 ]->league->name;

		return view( 'divisions.show', compact( 'league_name', 'divisions' ) );
	}

	public function create( $league_id ) 
	{
		return view( 'divisions.create', compact( 'league_id' ) );
	}

	public function store( $league_id, DivisionRequest $request ) 
	{
		$input = $request->all();

		$division = new Division( );

		$division->league_id 	= $league_id;
		$division->name 		= $input[ 'name' ];
		$division->active 		= $input[ 'active' ];

		$division->save( );

		return redirect( 'divisions/'.$league_id );
	}

	public function destroy( $league_id, $division_id ) 
	{
		#Remove Player from the Roster
		$division 			= Division::find( $division_id );
		$division->delete();

		return redirect( 'divisions/'.$league_id );
	}
}
