@extends('master_template')

@section('title')
Reservation
@stop

@section('content')
	@if(isset($cruises))
		@foreach ($cruises as $cruise)
			<h3><a href="{{ action ('CruiseController@show', [ $cruise->id ]) }}">{{ $cruise->name }}</a></h3>
			<p>From: {{ $ports[($cruise->origin) - 1]->name }} </p>
			<p>To: {{ $ports[($cruise->destination) - 1]->name }} </p>
			<p>Departing: {{ $cruise->departure->toDateTimeString() }}</p>
			<p>Arrival: {{ $cruise->arrival->toDateTimeString() }} </p>
		@endforeach
	@endif
@stop