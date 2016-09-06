<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Umpire;
use App\Http\Requests;
use App\Http\Requests\UmpireRequest;

class UmpiresController extends Controller
{
    public function index() 
	{
		$umpires = $this->umpireWithRating( );

		return view( 'umpires.index', compact( 'umpires' ) );
	}

	public function create() 
	{
		return view( 'umpires.create' );
	}

	public function store( UmpireRequest $request) 
	{
		$input = $request->all();

		$umpire = new Umpire( );

		$umpire->first_name	= $input[ 'first_name' ];
		$umpire->last_name 	= $input[ 'last_name' ];

		$umpire->save( );

		return redirect('umpires');
	}

	public function destroy( $umpire_id ) 
	{
		#Remove Player from the Roster
		$umpire 			= Umpire::find( $umpire_id );
		$umpire->delete();

		return redirect('umpires');
	}

	public function umpireWithRating() 
	{
		$umpires = Umpire::leftjoin('umpire_evaluations', 'umpire_evaluations.umpire_id', '=', 'umpires.umpire_id')
            ->select( 'umpires.umpire_id', 'umpires.first_name', 'umpires.last_name', DB::raw( 'AVG(`umpire_evaluations`.`rating`) as rating' ), DB::raw( 'COUNT(`umpire_evaluations`.`rating`) as num_of_evaluations' ) )
            ->groupBy( 'umpires.umpire_id' )
            ->get( );

		return $umpires;
	}

}
