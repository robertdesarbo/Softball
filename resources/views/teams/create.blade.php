@extends('layouts.app')

@section('content')
	<h2>Create Team</h2>

	{!! Form::open( ['url' => 'teams' ]) !!}

	    <div class="form-group">
	        {{ Form::label('name', 'Team Name') }}
	        {{ Form::text('name', null, ['class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('league_id', 'League') }}
	        {{ Form::select('league_id', $leagues, null, ['id' => 'league_id', 'class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('division_id', 'Division') }}
	        {{ Form::select('division_id', array( "" => "Choose One" ), null, ['id' => 'division_id', 'class' => 'form-control']) }}
	    </div>

	   	<div class="form-group">
	        {{ Form::label('session_id', 'Session') }}
	        {{ Form::select('session_id', array( "" => "Choose One" ), null, ['id' => 'session_id', 'class' => 'form-control']) }}
	    </div>

		<div class="row">
			<div class="form-group col-xs-2">
				<a href="{{ URL::previous() }}" class="btn btn-default form-control">Go Back</a>
			</div>

			<div class="form-group col-xs-2 pull-right">
				{!! Form::submit( 'Create', [ 'class' => 'btn btn-primary form-control']) !!}
			</div>
		</div>

	{!! Form::close() !!}
	
	<br/>

	@include( 'errors.list' )

	<script>
		$( document ).ready(function() 
		{
			var getDivisionIdList = function(e)
			{
				var league_id = e.target.value;

				//Ajax
				$.get('/ajax-divisions_in_league/'+league_id,function(data)
				{
					$( "#division_id" ).empty();

					$( "#division_id" ).append( '<option value="">Choose One</option>' );
					$.each(data,function(index, divisonObj)
					{
						$( "#division_id" ).append( '<option value="'+divisonObj.division_id+'">'+divisonObj.name+'</option>' );
					})
				})
			};

			var getSessionIdList = function(e)
			{
				var division_id = e.target.value;

				//Ajax
				$.get('/ajax-sessions_in_division/'+division_id,function(data)
				{
					$( "#session_id" ).empty();

					$( "#session_id" ).append( '<option value="">Choose One</option>' );
					$.each(data,function(index, sessionObj)
					{
						$( "#session_id" ).append( '<option value="'+sessionObj.session_id+'">'+sessionObj.MY_start_date+'</option>' );
					})
				})
			};

			$( "#league_id" ).on('change', getDivisionIdList );
			$( "#division_id" ).on('change', getSessionIdList );

			$( "#league_id, #division_id" ).trigger( "change" );

		});
	</script>

@endsection