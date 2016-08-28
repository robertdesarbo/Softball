@extends('layouts.app')

@section('content')
	<h2>Teams</h2>

	@if( count( $teams ) > 0 )

		<table class="table">
			<thead>
				<th>Team Name</th>
				<th>Captain</th>
			</thead>
			<tbody>
				@foreach ($teams as $team)

					<tr>
						<td>{{ $team->team->team_name }}</td>

						@if( $team->captain == 1 )
							<td>You</td>
						@else
							<td>{{ App\Team::getTeamCaptain( $team->team_id ) }}</td>
						@endif

					</tr>
				@endforeach
			</tbody>

		</table>

	@else
		You do not play for any teams!
	@endif
	
	<br/>

	<a href="{{ route('teams.find.index') }}" type="button" class="btn btn-default">Create a Team</a>

	<a href="{{ route('teams.find.index') }}" type="button" class="btn btn-default">Join a Team</a>

	@include( 'errors.list' )

@stop	