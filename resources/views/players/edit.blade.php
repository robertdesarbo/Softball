@extends('app')

@section('content')
	<h1>Edit: {!! $players->first_name !!} </h1>

	<hr>

	{!! Form::model( $players, ['method' => 'PATCH', 'url' => 'players/'. $players->player_id ] ) !!}

		@include( 'players.form', [ 'submitButtonText' => "Edit Player" ] )

	{!! Form::close() !!}

	@include( 'errors.list' );

@stop	