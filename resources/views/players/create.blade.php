@extends('layouts.app')

@section('content')
	<h2>New Player</h2>

	<hr>

	{!! Form::open( ['url' => 'players' ]) !!}

		@include( 'players.form', [ 'submitButtonText' => "Add Player" ] )

	{!! Form::close() !!}

	@include( 'errors.list' )

@stop	