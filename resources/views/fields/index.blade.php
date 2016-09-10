@extends('layouts.app')

@section('pageName')
	Fields
@stop

@section('content')
	<h1>Fields</h1>
	
	@include( 'errors.list' )

	@if( count( $fields ) > 0 ) 

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Location</th>
				<th style='text-align: center;'>Alcohol Allowed</th>
				<th style='text-align: center;'>Night Games</th>
				<th style='text-align: center;'>Google Maps</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($fields as $field)

					<tr>
						<td>{{ $field->name }}</td>
						<td>{{ $field->address.' '.$field->city.' '.$field->state.' '.$field->zip  }}</td>

						@if( $field->alcohol_allowed == 1 )
							<td style='text-align: center;'><i class="fa fa-check" aria-hidden="true"></i></td>
						@else
							<td></td>
						@endif

						@if( $field->night_games == 1 )
							<td style='text-align: center;'><i class="fa fa-check" aria-hidden="true"></i></td>
						@else
							<td></td>
						@endif

						<td style='text-align: center;'><i class="fa fa-map-marker" aria-hidden="true"></i></td>

						<td style='text-align: right;'>
							<form action="{{ URL::route('fields.destroy', $field->field_id ) }}" method="POST">
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
		There are no fields listed...
	@endif

	<a href="{{ route('fields.create') }}" type="button" class="btn btn-default">Create a Field</a>

@stop	