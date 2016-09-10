@extends('layouts.app')

@section('pageName')
	Umpires
@stop

@section('content')
	<h1>Umpires</h1>
	
	@if( count( $umpires ) > 0 ) 

		<table class="table">
			<thead>
				<th>Name</th>
				<th>Rating</th>
				<th style='text-align:center'># Evaulations</th>
				<th style='text-align:center'>Review</th>
				<th></th>
			</thead>
			<tbody>

				@foreach ($umpires as $umpire)

					<tr>
						<td>{{ $umpire->first_name . ' ' . $umpire->last_name }}</td>	
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
						<td style='text-align:center'>{{ $umpire->num_of_evaluations }} </td>
						<td style='text-align:center'>
							<a href="{{ route('umpires.index') }}" type="button" class="text-primary">
								<i class="fa fa-edit fa-lg" aria-hidden="true"></i>
							</a>
						</td>
						<td style='text-align: right;'>
							<form action="{{ URL::route('umpires.destroy', $umpire->umpire_id ) }}" method="POST">
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
		There are no umpires listed...
	@endif

	<a href="{{ route('umpires.create') }}" type="button" class="btn btn-default">Create a Umpire</a>
@stop	