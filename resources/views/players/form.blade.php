		<div class="form-group">
			{!! Form::label('first_name', 'First Name:' ) !!}
			{!! Form::text('first_name', null, [ 'class' => 'form-control' ]) !!}	
		</div>
		
		<div class="form-group">
			{!! Form::label('last_name', 'Last Name:' ) !!}
			{!! Form::text('last_name', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('date_of_birth', 'Date Of Birth:' ) !!}
			{!! Form::input( 'date', 'date_of_birth', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('address', 'Address:' ) !!}
			{!! Form::text('address', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('city', 'City:' ) !!}
			{!! Form::text('city', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('state', 'State:' ) !!}
			{!! Form::text('state', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('zip', 'Zip:' ) !!}
			{!! Form::text('zip', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('gender', 'Gender:' ) !!}
			{!! Form::text('gender', null, [ 'class' => 'form-control' ]) !!}	
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText, [ 'class' => 'btn btn-primary form-control']) !!}
		</div>