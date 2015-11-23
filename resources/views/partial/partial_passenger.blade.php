	
<h2>Passenger</h2>
<div class="form-group">
{!! Form::label('passenger_title', 'Title') !!}
{!! Form::select('passenger_title', array('Mr.', 'Mrs.', 'Ms.'), array('Mr.', 'Mrs.', 'Ms.'), ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_name', 'Name') !!}
{!! Form::text('passenger_name', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_age', 'Age') !!}
{!! Form::input('number', 'passenger_age', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_sex', 'Sex') !!}
{!! Form::select('passenger_sex', array('M', 'F'), array('M', 'F'), ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_address1', 'Address') !!}
{!! Form::text('passenger_address1', null, ['class' => 'form-control', 'required']) !!}

{!! Form::text('passenger_address2', null, ['class' => 'form-control']) !!}

{!! Form::text('passenger_address3', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_state', 'State') !!}
{!! Form::text('passenger_state', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_country', 'Country') !!}
{!! Form::text('passenger_country', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
{!! Form::label('passenger_country', 'Occupation') !!}
{!! Form::text('passenger_occupation', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
	<button class="tab-button btn btn-primary btn-sm" type="button" id="confirmRegistration"> Select </button>

	<script>
		$('#confirmRegistration').click(function(){
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
			var cruise = $('#cruise_form').val();
			var cabin = $('#cabin_form').val();

			var request = $.ajax({
	    		type: "GET",
	    		url : "/getconfirmation",
	    		data: { cruiseid : cruise, cabinid : cabin }
			});

	    	request.done(function( msg ) {
				$("#confirmationtab").html(msg);
			});

			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
		});
	</script>
</div>