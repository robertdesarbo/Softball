@extends('app')

@section('content')
	<h2>Search Players</h2>

	<hr>

	{!! Form::model( array('action' => 'PlayersController@search') ) !!}

		<div class="form-group">
			{!! Form::label('search_info', 'Search' ) !!}
			{!! Form::text('search_info', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('search_type', 'Type' ) !!}
			{!! Form::select('search_type', ['Under 18', '19 to 30', 'Over 30'], null, [ 'class' => 'form-control' ]) !!}
		</div>
	
		<div class="form-group">
			{!! Form::submit('Search', [ 'class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

	@if( $players !== null) 
		@foreach ($players as $player)

			<h2>{{ $player->first_name }} {{ $player->last_name }}</h2>

		@endforeach
	@endif

	@include( 'errors.list' )

@stop	