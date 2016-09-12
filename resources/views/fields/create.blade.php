@extends('layouts.app')

@section('pageName')
	Fields
@stop

@section('content')
	<h2>Create a Field</h2>

	<hr>
	
	@include( 'errors.list' )

	{!! Form::open( ['url' => 'fields' ]) !!}

	    <div class="form-group">
	        {{ Form::label('name', 'Name') }}
	        {{ Form::text('name', null, ['class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('address', 'Address') }}
	        {{ Form::text('address', null, ['class' => 'form-control']) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('city', 'City') }}
	        {{ Form::text('city', null, ['class' => 'form-control']) }}
	    </div>

	   	<div class="form-group">
	        {{ Form::label('state', 'State') }}
	        {{ Form::select('state',array(
	        							''=>'Choose One',
									    'AL'=>'Alabama',
									    'AK'=>'Alaska',
									    'AZ'=>'Arizona',
									    'AR'=>'Arkansas',
									    'CA'=>'California',
									    'CO'=>'Colorado',
									    'CT'=>'Connecticut',
									    'DE'=>'Delaware',
									    'DC'=>'District of Columbia',
									    'FL'=>'Florida',
									    'GA'=>'Georgia',
									    'HI'=>'Hawaii',
									    'ID'=>'Idaho',
									    'IL'=>'Illinois',
									    'IN'=>'Indiana',
									    'IA'=>'Iowa',
									    'KS'=>'Kansas',
									    'KY'=>'Kentucky',
									    'LA'=>'Louisiana',
									    'ME'=>'Maine',
									    'MD'=>'Maryland',
									    'MA'=>'Massachusetts',
									    'MI'=>'Michigan',
									    'MN'=>'Minnesota',
									    'MS'=>'Mississippi',
									    'MO'=>'Missouri',
									    'MT'=>'Montana',
									    'NE'=>'Nebraska',
									    'NV'=>'Nevada',
									    'NH'=>'New Hampshire',
									    'NJ'=>'New Jersey',
									    'NM'=>'New Mexico',
									    'NY'=>'New York',
									    'NC'=>'North Carolina',
									    'ND'=>'North Dakota',
									    'OH'=>'Ohio',
									    'OK'=>'Oklahoma',
									    'OR'=>'Oregon',
									    'PA'=>'Pennsylvania',
									    'RI'=>'Rhode Island',
									    'SC'=>'South Carolina',
									    'SD'=>'South Dakota',
									    'TN'=>'Tennessee',
									    'TX'=>'Texas',
									    'UT'=>'Utah',
									    'VT'=>'Vermont',
									    'VA'=>'Virginia',
									    'WA'=>'Washington',
									    'WV'=>'West Virginia',
									    'WI'=>'Wisconsin',
									    'WY'=>'Wyoming',
									), 
									null, 
									array(
									    'class' => 'form-control'
									)
							)
			}}
	    </div>

	    <div class="form-group">
	        {{ Form::label('zip', 'Zip') }}
	        {{ Form::text('zip', null, ['class' => 'form-control']) }}
	    </div>

	  	<div class="form-group">
	        {{ Form::label('alcohol_allowed', 'Alcohol Allowed', ['class' => 'form-check-label' ] ) }}
	        {{ Form::select('alcohol_allowed',array( "0" => "No", "1" => "Yes" ), null, array( 'class' => 'form-control' ) ) }}
		</div>

		<div class="form-group">
	        {{ Form::label('pets_allowed', 'Alcohol Allowed', ['class' => 'form-check-label' ] ) }}
	        {{ Form::select('pets_allowed',array( "0" => "No", "1" => "Yes" ), null, array( 'class' => 'form-control' ) ) }}
		</div>


		<div class="form-group">
	        {{ Form::label('night_games', 'Night Games', ['class' => 'form-check-label' ] ) }}
	        {{ Form::select('night_games',array( "0" => "No", "1" => "Yes" ), null, array( 'class' => 'form-control' ) ) }}
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