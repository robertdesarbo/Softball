@extends('layouts.app')

@section('content')
	<h2>Standings</h2>

	@if( count( $standings ) > 0 )

		<table class="table">
			<thead>
				<th>Place</th>
				<th>Team</th>
				<th>Wins</th>
				<th>Loses</th>
				<th>Games Behind</th>
			</thead>
			<tbody>
				@foreach ($standings as $position)

					<tr>
						<td>{{ $position->position }}</td>
						<td>{{ $position->team_name }}</td>
						<td>{{ $position->wins }}</td>
						<td>{{ $position->loses }}</td>
						<td>{{ $position->games_behind }}</td>
					</tr>

				@endforeach
			</tbody>

		</table>

	@else
		You do not play for any teams!
	@endif
	
	@include( 'errors.list' )

@stop	