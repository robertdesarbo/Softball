<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Umpire;
use App\Http\Requests;

class UmpiresController extends Controller
{
    public function index() 
	{
		$umpires = Umpire::all( );

		return view( 'umpires.index', compact( 'umpires' ) );
	}
}
