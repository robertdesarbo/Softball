<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function index()
    {
    	$data = array( 'pageName' => "Welcome" );

        return view('pages.home', $data);
    }

}
