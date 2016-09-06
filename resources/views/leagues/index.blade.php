@extends('layouts.app')

@section('content')
	<h2>Leagues</h2>

	@if( count( $leagues ) > 0 )

		<table class="table">
			<thead>
				<th>League</th>
				<th>Type</th>
				<th>Active</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($leagues as $league)

					<tr>
						<td>
							<a href="{{ route( 'divisions.show', [ $league->league_id ] ) }}" type="button" class="text-danger">
								{{ $league->name }}
							</a>
						</td>
						<td>{{ $league->type }}</td>
						<td>{{ $league->active }}</td>
						<td style='text-align: right;'>
							<form action="{{ URL::route('leagues.destroy', $league->league_id ) }}" method="POST">
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

	<a href="{{ route('leagues.create' ) }}" type="button" class="btn btn-default">Create a League</a>

	@include( 'errors.list' )

@stop	