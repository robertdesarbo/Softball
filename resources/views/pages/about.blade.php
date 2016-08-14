@extends('app')

@section('pageName')
	{{ $pageName }}
@stop

@section('content')

<h1>About</h1>

<h3>People I Like</h3>

@if ( count( $people ) )
	<ol>
		@foreach ($people as $person)
			<li>{{ $person }}</li>
		@endforeach
	</ol>
@else
	none
@endif

<p>Test</p>

@stop