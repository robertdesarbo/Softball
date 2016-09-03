@extends('layouts.app')

@section('content')
	<h1>Fields</h1>
	
	@if( count( $fields ) > 0 ) 

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Location</th>
				<th>Alcohol Allowed</th>
				<th>Google Maps</th>
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
						<td style='text-align: center;'><i class="fa fa-map-marker" aria-hidden="true"></i></td>		
					</tr>

				@endforeach
			</tbody>

		</table>

	@else
		There are no fields listed...
	@endif
@stop	