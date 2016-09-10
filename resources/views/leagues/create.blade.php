@extends('layouts.app')

@section('pageName')
	Leagues
@stop


@section('content')
	<h1>Create League</h1>
	
	@include( 'errors.list' )

	{!! Form::open( ['url' => 'leagues' ]) !!}

	    <div class="form-group">
	        {{ Form::label('name', 'Name') }}
	        {{ Form::text('name', null, ['class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('type', 'Type') }}
	        {{ Form::select('type',array( '' => 'Choose One', 'COED 7 & 3' => 'COED 7 & 3', 'COED' => 'COED', 'Mens' => 'Mens', 'Womens' => 'Womens' ), null, array( 'class' => 'form-control' ) ) }}
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