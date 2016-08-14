@extends('app')

@section('content')
	<h1>{{ $players->first_name }} {{ $players->last_name }}</h1>

	<article>
		{{ $players->address }}
	</article>

@stop	