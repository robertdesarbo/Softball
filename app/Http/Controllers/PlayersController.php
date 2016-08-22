<?php

namespace App\Http\Controllers;

use App\Player;

use Request;

use App\Http\Requests;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\SearchRequest;

class PlayersController  extends Controller
{

	public function index() 
	{
		$players = null;

		return view( 'players.search', compact( 'players' ) );
	}


	public function show($id) 
	{
		$players = Player::findOrFail($id);

		return view( 'players.show', compact( 'players' ) );
	}

	public function create() 
	{
		return view( 'players.create' );
	}

	public function store(PlayerRequest $request) 
	{
		#Form inputs
		$input = $request->all();

		$players = new Player;

		$players->first_name 	= $input[ 'first_name' ];
		$players->last_name 	= $input[ 'last_name' ];
		$players->date_of_birth = $input[ 'date_of_birth' ];
		$players->address 		= $input[ 'address' ];
		$players->city 			= $input[ 'city' ];
		$players->state 		= $input[ 'state' ];
		$players->zip 			= $input[ 'zip' ];
		$players->gender 		= $input[ 'gender' ];

		$players->save();

		return redirect( 'players' );

	}

	public function edit($id) 
	{
		$players = Player::findOrFail($id);

		return view( 'players.edit', compact( 'players' ) );
	}

	public function search(SearchRequest $request) 
	{
		$input = $request->all();

		#Search on Last Name
		if( $input[ 'search_type' ] == 0 )
		{
			$players = Player::where( 'last_name', 'LIKE', '%'.$input[ 'search_info' ].'%' )->orderBy('last_name', 'asc')->get();
		}

		return view( 'players.search', compact( 'players' ) );
	}

	public function update($id, PlayerRequest $request) 
	{
		#Form inputs
		$input = $request->all();

		$players = Player::findOrFail($id);

		$players->first_name 	= $input[ 'first_name' ];
		$players->last_name 	= $input[ 'last_name' ];
		$players->date_of_birth = $input[ 'date_of_birth' ];
		$players->address 		= $input[ 'address' ];
		$players->city 			= $input[ 'city' ];
		$players->state 		= $input[ 'state' ];
		$players->zip 			= $input[ 'zip' ];
		$players->gender 		= $input[ 'gender' ];

		$players->save();

		return redirect( 'players' );
	}


}
