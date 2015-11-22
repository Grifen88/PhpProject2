	
<h2>Passenger</h2>
<div class="form-group">
{!! Form::label('passenger_name', 'Name') !!}
{!! Form::text('pasenger_name', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_age', 'Age') !!}
{!! Form::text('pasenger_age', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_sex', 'Sex') !!}
{!! Form::text('pasenger_sex', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_address1', 'Address') !!}
{!! Form::text('pasenger_address1', null, ['class' => 'form-control']) !!}

{!! Form::text('pasenger_address2', null, ['class' => 'form-control']) !!}

{!! Form::text('pasenger_address3', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_state', 'State') !!}
{!! Form::text('pasenger_state', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_country', 'Country') !!}
{!! Form::text('pasenger_state', null, ['class' => 'form-control']) !!}

{!! Form::label('passenger_country', 'Occupation') !!}
{!! Form::text('pasenger_country', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Complete Reservation', ['class' => 'btn btn-primary form-control']) !!}
</div>