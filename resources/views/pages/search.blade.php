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
		        $("#searchpartial").load("partial_search.blade.php");
		        window.alert("Button was pressed!");
		    });
		</script>

	{!! Form::close() !!}

	@include('partial.partial_search')
@stop