@extends('layouts.app')

@section('content')
	<h1>Umpires</h1>
	
	@if( count( $umpires ) > 0 ) 

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Rating</th>
				<th style='text-align:center'>Review</th>
				<th style='text-align:center'>Evaulations</th>
			</thead>
			<tbody>

				@foreach ($umpires as $umpire)

					<tr>
						<td>{{ $umpire->first_name. ' '.$umpire->last_name }}</td>	
						<td>

							@for($i = 1; $i < $umpire->rating; $i++)
								<i class="fa fa-star" aria-hidden="true"></i>
							@endfor

							@if( $umpire->rating-intval($umpire->rating) >= .5 )
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
							@endif

							@for($i = $umpire->rating+round($umpire->rating-intval($umpire->rating)); $i < 5; $i++)
								<i class="fa fa-star-o" aria-hidden="true"></i>
							@endfor
							
						</td>
						<td style='text-align:center'><i class="fa fa-edit" aria-hidden="true"></i></td>
						<td style='text-align:center'>{{ $umpire->num_of_evaluations }} </td>
					</tr>

				@endforeach

			</tbody>

		</table>

	@else
		There are no fields listed...
	@endif
@stop	