@extends('layouts.app')

@section('pageName')
	Divisions
@stop

@section('content')
	<h2>{{ $league_name }}</h2>
	
	<hr>

	@include( 'errors.list' )

	@if( count( $divisions ) > 0 )

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Active</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($divisions as $division)

					<tr>
						<td>
							<a href="{{ url( '/sessions/'.$division->league_id.'/'.$division->division_id ) }}" type="button" class="text-danger">
								{{ $division->name }}
							</a>
						</td>
						<td>{{ $division->active }}</td>
						<td style='text-align: right;'>
							<form action="{{ url( '/divisions/'.$division->league_id.'/'.$division->division_id ) }}" method="POST">
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
		You do not play for any teams!
	@endif
	
	<br/>

	<a href="{{ url( '/leagues/' ) }}" type="button" class="btn btn-default">Go Back To Leagues</a>

	<a href="{{ url( '/divisions/'.$division->league_id.'/create' ) }}" type="button" class="btn btn-default pull-right">Create a Divisions</a>

@stop	