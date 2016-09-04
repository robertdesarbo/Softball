<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Umpire;
use App\Http\Requests;

class UmpiresController extends Controller
{
    public function index() 
	{
		$umpires = $this->umpireWithRating( );

		return view( 'umpires.index', compact( 'umpires' ) );
	}

	public function umpireWithRating() 
	{
		$umpires = Umpire::join('umpire_evaluations', 'umpire_evaluations.umpire_id', '=', 'umpires.umpire_id')
            ->select( 'umpires.first_name', 'umpires.last_name', DB::raw( 'AVG(`umpire_evaluations`.`rating`) as rating' ), DB::raw( 'COUNT(`umpire_evaluations`.`rating`) as num_of_evaluations' ) )
            ->groupBy( 'umpires.umpire_id' )
            ->get( );

		return $umpires;
	}

}
