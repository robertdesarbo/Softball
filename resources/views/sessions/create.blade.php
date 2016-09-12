@extends('layouts.app')

@section('pageName')
	Sessions
@stop

@section('content')
	<h2>Create A Session</h2>

	<hr>

	@include( 'errors.list' )

	{!! Form::open( ['url' => 'sessions/'.$league_id.'/'.$division_id ]) !!}

	    <div class="form-group">
	        {{ Form::label('start_date', 'Start') }}
	        {{ Form::input('date', 'start_date', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
	    </div>

	  	<div class="form-group">
	        {{ Form::label('end_date', 'End') }}
	        {{ Form::input('date', 'end_date', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
	    </div>

	  	<div class="form-group">
	        {{ Form::label('active', 'Active', ['class' => 'form-check-label' ] ) }}
	        {{ Form::select('active',array( '' => 'Choose One', "0" => "No", "1" => "Yes" ), null, array( 'class' => 'form-control' ) ) }}
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

@stop