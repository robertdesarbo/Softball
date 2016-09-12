<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Field;
use App\Http\Requests;
use App\Http\Requests\FieldRequest;

class FieldsController extends Controller
{
    public function index() 
	{
		$fields = Field::all( );

		return view( 'fields.index', compact( 'fields' ) );
	}

	public function create() 
	{
		return view( 'fields.create' );
	}

	public function store( FieldRequest $request ) 
	{
		$input = $request->all();

		$field = new Field( );

		$field->name 			= $input[ 'name' ];
		$field->address 		= $input[ 'address' ];
		$field->city 			= $input[ 'city' ];
		$field->state 			= $input[ 'state' ];
		$field->zip 			= $input[ 'zip' ];
		$field->alcohol_allowed = $input[ 'alcohol_allowed' ];
		$field->pets_allowed 	= $input[ 'pets_allowed' ];
		$field->night_games 	= $input[ 'night_games' ];
		$field->active 			= 1;

		$field->save();

		return redirect('fields');
	}

	public function destroy( $field_id ) 
	{
		#Remove Player from the Roster
		$field 			= Field::find( $field_id );
		$field->delete();

		return redirect('fields');
	}
}
