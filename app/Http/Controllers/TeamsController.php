<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TeamsController extends Controller
{
	use TeamsPlayerIsOnTrait;

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

}