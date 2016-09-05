@extends('layouts.app')

@section('content')
	<h2>Teams</h2>

	@if( count( $teams ) > 0 )

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Captain</th>
				<th>Division</th>
				<th>League</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($teams as $team)

					<tr>
						<td>{{ $team->team->name }}</td>

						@if( $team->captain == 1 )
							<td class="text-success"><strong>You</strong></td>
						@else
							@if( App\Team::getTeamCaptain( $team->team_id ) === null )
								<td class="text-danger"><strong>None</strong></td>
							@else
								<td>{{ App\Team::getTeamCaptain( $team->team_id ) }}</td>
							@endif
						@endif
						
						<td>{{ $team->team->session->division->name }}</td>
						<td>{{ $team->team->session->division->league->name }}</td>
						<td>
							<a href="{{ route('teams.remove', [ $team->team_roster_id ]) }}" type="button" class="text-danger">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						</td>

					</tr>

				@endforeach

			</tbody>

		</table>

	@else
		You do not play for any teams!
	@endif
	
	<br/>

	<a href="{{ route('teams.list_team') }}" type="button" class="btn btn-default">Join a Team</a>

	<a href="{{ route('teams.create_team') }}" type="button" class="btn btn-default pull-right">Create a Team</a>

	@include( 'errors.list' )

@stop	