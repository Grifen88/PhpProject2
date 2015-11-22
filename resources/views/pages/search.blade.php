@extends('master_template')

@section('title')
	Search
@stop

@section('content')
	<h2>Search for available cruises:</h1>

	{!! Form::open() !!}

		<div class="form-group">
			{!! Form::label('search', 'Search') !!}
			{!! Form::text('search', null, ['class' => 'form-control']) !!}

			<button type="button" id="searchButton"> Search </button>
		</div>

		<script type="text/javascript">

			//logic to check input

		    $("#searchButton").click(function() {
		    	var searchterm = $('#search').val(); 

		    	if (!searchterm) {
		    		window.alert("Search cannot be blank!");
		    		return false;
		    	}

		    	var request = $.ajax({
            		type: "GET",
            		url : "/searchresult",
            		data: { searchterm: searchterm }
		    	});

		    	request.done(function( msg ) {
					$("#search_partial").html(msg);
				});

				request.fail(function( jqXHR, textStatus ) {
					alert( "Request failed: " + textStatus );
				});
		    });
		</script>

	{!! Form::close() !!}
	<div id="search_partial">
		@include('partial.partial_search')
	</div>
@stop