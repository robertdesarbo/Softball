@extends('layouts.app')

@section('content')
	<h2>{{ $division_name }}</h2>

	@if( count( $sessions ) > 0 )

		<table class="table">
			<thead>
				<th>Start</th>
				<th>End</th>
				<th>Active</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($sessions as $session)

					<tr>
						<td>{{ $session->start_date->format( "M Y" ) }}</td>
						<td>{{ $session->end_date->format( "M Y" ) }}</td>

							@if( $session->active )
								<td class="text-success"><strong>Yes</strong></td>
							@else
								<td class="text-danger"><strong>No</strong></td>>
							@endif

						<td style='text-align: right;'>
							<form action="{{ URL::route('sessions.destroy', $session->session_id ) }}" method="POST">
							    <input type="hidden" name="_method" value="DELETE">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <button type="submit" class="btn btn-danger">
									<i class="fa fa-times " aria-hidden="true"></i>
								</button>
							</form>
						</td>

					</tr>

				@endforeach

			</tbody>

		</table>

	@else
		There are no sessions for this division!
	@endif
	
	<br/>

	<a href="{{ url( '/divisions/'.$league_id ) }}" type="button" class="btn btn-default">Go Back To Division</a>

	<a href="{{ url( '/sessions/'.$league_id.'/'.$division_id.'/create' ) }}" type="button" class="btn btn-default pull-right">Create a Session</a>

	@include( 'errors.list' )

@stop	