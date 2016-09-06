@extends('layouts.app')

@section('content')
	<h1>Create Division</h1>
	
	{!! Form::open( ['url' => 'divisions/'.$league_id ]) !!}

	    <div class="form-group">
	        {{ Form::label('name', 'Name') }}
	        {{ Form::text('name', null, ['class' => 'form-control']) }}
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

	@include( 'errors.list' )
@stop