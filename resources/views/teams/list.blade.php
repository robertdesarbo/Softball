@extends('layouts.app')

@section('content')
	<h2>Join Team</h2>

	{!! Form::open( ['url' => 'teams/list_team' ]) !!}

	    <div class="form-group">
	        {{ Form::label('title', 'Team Name') }}
	        {{ Form::text('name', null, ['class' => 'form-control']) }}
	    </div>

		<div class="row">
			<div class="form-group col-xs-2">
				<a href="{{ URL::previous() }}" class="btn btn-default form-control">Go Back</a>
			</div>

			<div class="form-group col-xs-2 pull-right">
				{!! Form::submit( 'Search', [ 'class' => 'btn btn-primary form-control']) !!}
			</div>
		</div>

	{!! Form::close() !!}
	
	@if( count( $teams ) > 0 )
		
		<table class="table">
			<thead>
				<th>Name</th>
				<th>Captain</th>
				<th>Division</th>
				<th>League</th>
			</thead>
			<tbody>

				@foreach ($teams as $team)

					<tr>
						<td>{{ $team->name }}</td>


						@if( count($team->teamroster) !== 0 && $team->teamroster[0]->user_id== Auth::user()->user_id )
							<td class="text-success"><strong>You</strong></td>
						@else
							@if( count($team->teamroster) == 0 )
								<td class="text-danger"><strong>None</strong></td>
							@else
								<td>{{ $team->teamroster[0]->user->first_name . " " . $team->teamroster[0]->user->last_name }}</td>
							@endif
						@endif
						
						<td>{{ $team->session->division->name }}</td>
						<td>{{ $team->session->division->league->name }}</td>

					</tr>
					
				@endforeach

			</tbody>

		</table>

	@else
		We could not find any teams that match that search!
	@endif
	
	<br/>
	<br/>

	@include( 'errors.list' )

@endsection