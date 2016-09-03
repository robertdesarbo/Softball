<?php

namespace App\Http\Controllers;

use App\TeamRoster;
use Auth;

trait TeamsPlayerIsOnTrait
{
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