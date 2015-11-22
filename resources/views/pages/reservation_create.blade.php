@extends('master_template')

@section('title')
Reservation
@stop

@section('content')
	<div class="container">
		{!! Form::open(array('action' => 'ReservationController@store')) !!}
		<h2>Create a new reservation:</h2>
			<ul id="tabs" class="nav nav-tabs">
		  		<li class="active"><a data-toggle="tab" href="#cruisetab">Cruise</a></li>
		  		<li><a data-toggle="tab" href="#cabintab">Cabins</a></li>
		  		<li><a data-toggle="tab" href="#passengertab">Passengers</a></li>
			</ul>

		<div id="tabs_content" class="tab-content">
		  	<div id="cruisetab" class="tab-pane fade in active">
		    	<h3>Cruises</h3>
		    	<p>List of available cruises.</p>

		    		@if(isset($cruises))
					{!! Form::label('cruise_form', 'Cruise') !!}
					{!! Form::select('cruise_form', array_pluck($cruises, 'name'), array_pluck($cruises, 'id')) !!}
					@endif

				<button class="tab-button btn btn-primary btn-sm" type="button" id="selectCruiseBtn"> Select </button>
		  	</div>
		  	<div id="cabintab" class="tab-pane fade">
		    	<h3>Cabin</h3>
		    	<p>List of available cabins</p>
		  	</div>
		  	<div id="passengertab" class="tab-pane fade">
		    	<h3>Passenger</h3>
		    	<p>Please enter passenger details</p>
		  	</div>

		  	<script>
					$('#selectCruiseBtn').click(function(){
						$('.nav-tabs > .active').next('li').find('a').trigger('click');

						var cruise = $('#cruise_form').val();

						var request = $.ajax({
		            		type: "GET",
		            		url : "/getallcabins",
		            		data: { cruiseid : cruise }
				    	});

				    	request.done(function( msg ) {
							$("#cabintab").html(msg);
						});

						request.fail(function( jqXHR, textStatus ) {
							alert( "Request failed: " + textStatus );
						});
					});
			</script>
		</div>
		{!! Form::close() !!}
	</div>
@stop