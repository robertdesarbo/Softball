@extends('layouts.app')

@section('content')
	<h1>Create Umpire</h1>
	
	{!! Form::open( ['url' => 'umpires' ]) !!}

	    <div class="form-group">
	        {{ Form::label('first_name', 'First Name') }}
	        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('last_name', 'Last Name') }}
	        {{ Form::text('last_name', null, ['class' => 'form-control']) }}
	    </div>

		<br/>
		
		<div class="row">
			<div class="form-group col-xs-2">
				<a href="{{ URL::previous() }}" class="btn btn-default form-control">Go Back</a>
			</div>

			<div class="form-group col-xs-2 pull-right">
				{!! Form::submit( 'Create', [ 'class' => 'btn btn-primary form-control']) !!}
			</div>
		</div>

	{!! Form::close() !!}

	@include( 'errors.list' )
@stop