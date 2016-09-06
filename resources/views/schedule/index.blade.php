@extends('layouts.app')

@section('content')
	<h2>Schedule</h2>

	@if( count( $teams ) > 0 )

		@foreach ($teams as $team)

			<h3>{{ $team[ 'name' ] }}</h3>

			<table class="table">
				<thead>
					<th>Home</th>
					<th>Away</th>
					<th>Date</th>
					<th>Time</th>
					<th>Location</th>
				</thead>
				<tbody>

				@foreach ($team[ 'games' ] as $game)

					<tr>
						<td>{{ $game->away_team->name }}</td>
						<td>{{ $game->home_team->name }}</td>
						<td>{{ $game->game_time->format('M nS') }}</td>
						<td>{{ $game->game_time->format('g:i a') }}</td>
						<td>{{ $game->field->name }}</td>		
					</tr>
				
				@endforeach

				</tbody>

			</table>

			<br/>
			
		@endforeach

	@else
		You do not play for any teams!
	@endif

	@include( 'errors.list' )

@stop	