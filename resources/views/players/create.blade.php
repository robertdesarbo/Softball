@extends('app')

@section('content')
	<h1>Create a New Player</h1>

	<hr>

	{!! Form::open( ['url' => 'players' ]) !!}

		@include( 'players.form', [ 'submitButtonText' => "Add Player" ] )

	{!! Form::close() !!}

	@include( 'errors.list' );

@stop	