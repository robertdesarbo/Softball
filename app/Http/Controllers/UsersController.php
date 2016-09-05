<?php

namespace App\Http\Controllers;

use App\User;

use Request;
use Auth;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SearchRequest;

class UsersController extends Controller
{

	public function index() 
	{
		$users = null;
		
		return view( 'users.search', compact( 'users' ) );
	}


	public function show($id) 
	{
		$users = User::findOrFail($id);

		return view( 'users.show', compact( 'users' ) );
	}

	public function create() 
	{
		return view( 'users.create' );
	}

	public function store(UserRequest $request) 
	{
		#Form inputs
		$input = $request->all();

		$users = new User;

		$users->first_name 	= $input[ 'first_name' ];
		$users->last_name 	= $input[ 'last_name' ];
		$users->date_of_birth = $input[ 'date_of_birth' ];
		$users->address 		= $input[ 'address' ];
		$users->city 			= $input[ 'city' ];
		$users->state 		= $input[ 'state' ];
		$users->zip 			= $input[ 'zip' ];
		$users->gender 		= $input[ 'gender' ];

		$users->save();

		return redirect( 'users' );

	}

	public function edit($id) 
	{
		$users = User::findOrFail($id);

		return view( 'users.edit', compact( 'users' ) );
	}

	public function search(SearchRequest $request) 
	{
		$input = $request->all();

		#Search on Last Name
		if( $input[ 'search_type' ] == 0 )
		{
			$users = User::where( 'last_name', 'LIKE', '%'.$input[ 'search_info' ].'%' )->orderBy('last_name', 'asc')->get();
		}

		return view( 'users.search', compact( 'users' ) );
	}

	public function update($id, UserRequest $request) 
	{
		#Form inputs
		$input = $request->all();

		$users = User::findOrFail($id);

		$users->first_name 	= $input[ 'first_name' ];
		$users->last_name 	= $input[ 'last_name' ];
		$users->date_of_birth = $input[ 'date_of_birth' ];
		$users->address 		= $input[ 'address' ];
		$users->city 			= $input[ 'city' ];
		$users->state 		= $input[ 'state' ];
		$users->zip 			= $input[ 'zip' ];
		$users->gender 		= $input[ 'gender' ];

		$users->save();

		return redirect( 'users' );
	}

trait PrintReport {
	public function getTeamsUserIsOn( )
	{
		$teamRoster = Auth::user()
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

		return $teamRoster;
	}}


}
