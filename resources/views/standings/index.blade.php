@extends('layouts.app')

@section('pageName')
	Standings
@stop

@section('content')
	<h2>Standings</h2>
	
	@include( 'errors.list' )

	@if( count( $standings ) > 0 )

		@foreach ($standings as $session)

			<h3>{{ $session[ 'division_name' ] . " (" . $session[ 'start_date' ] . ")" }}</h3>

			<table class="table">
				<thead>
					<th>Place</th>
				<th>Team</th>
					<th style='text-align: center;'>Wins</th>
					<th style='text-align: center;'>Loses</th>
					<th style='text-align: center;'>Ties</th>
					<th style='text-align: center;'>Games Played</th>
				</thead>
				<tbody>
					
						@foreach ( $session[ 'teams' ] as $pos => $team )

							<tr>
								<td>{{ $pos+1 }}</td>
								<td>{{ $team[ 'name' ] }}</td>
								<td style='text-align: center;'>{{ $team[ 'wins' ] }}</td>
								<td style='text-align: center;'>{{ $team[ 'loses' ] }}</td>
								<td style='text-align: center;'>{{ $team[ 'ties' ] }}</td>
								<td style='text-align: center;'>{{ $team[ 'games_played' ] }}</td>
								
							</tr>

						@endforeach

					
				</tbody>

			</table>

			<br/>

		@endforeach

	@else
		You do not play for any teams!
	@endif

@stop	