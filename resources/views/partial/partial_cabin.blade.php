<!-- search result -->

@if(isset($cabins))

	<h2> Cabin </h2>
	{!! Form::label('cabin_form', 'Cabin') !!}
	<?php $options = [];
		foreach ($cabins as $cabin) {
			$a = ['value' => $cabin->id, 'display' => $cabin->location, 'class' => ''];
		   	array_push($options, $a) ;
		}
		echo Form::fancySelect('cabin_form', $options); 
	?>

	<button class="tab-button btn btn-primary btn-sm" type="button" id="selectCabinBtn"> Select </button>

	<script>
		$('#selectCabinBtn').click(function(){
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
			
			var request = $.ajax({
	    		type: "GET",
	    		url : "/getpassengerform"
    		});

	    	request.done(function( msg ) {
				$("#passengertab").html(msg);
			});

			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
		});
	</script>
@else
	<p>Type your search terms in the box!</p>
@endif