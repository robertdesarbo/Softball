@extends('layouts.app')

@section('content')
	<h1>Players</h1>
	
	@if( count( $players ) > 0 ) 
		@foreach ($players as $player)
			<article>
				<h2>{{ $player->first_name }}</h2>

				<div class="bod">
					<a href=" {{ url('/players', $player->player_id ) }}">
						{{ $player->address }}
					</a>
				</div>
			</article>
			
		@endforeach
	@else
		You have no teams listed
	@endif
@stop	