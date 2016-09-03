@extends('layouts.app')

@section('content')
	<h1>Umpires</h1>
	
	@if( count( $umpires ) > 0 ) 

		<table class="table">
			<thead>
				<th>Name</th>
				<th style='text-align:center'>Rating</th>
				<th style='text-align:center'>Review</th>
			</thead>
			<tbody>
				@foreach ($umpires as $umpire)

					<tr>
						<td>{{ $umpire->first_name. ' '.$umpire->last_name }}</td>	
						<td style='text-align:center'><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
						<td style='text-align:center'><i class="fa fa-edit" aria-hidden="true"></i></td>
					</tr>

				@endforeach
			</tbody>

		</table>

	@else
		There are no fields listed...
	@endif
@stop	