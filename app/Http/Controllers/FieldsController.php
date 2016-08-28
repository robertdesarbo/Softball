<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Field;
use App\Http\Requests;

class FieldsController extends Controller
{
    public function index() 
	{
		$fields = Field::all( );

		return view( 'fields.index', compact( 'fields' ) );
	}
}
