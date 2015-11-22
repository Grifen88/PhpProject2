@extends('master_template')

@section('title')
Cruises
@stop

@section('content')
	@foreach ($cruises as $cruise)
		<h3><a href="{{ action ('CruiseController@show', [ $cruise->id ]) }}">{{ $cruise->name }}</a></h3>
		<p>From: {{ $port[($cruise->origin)-1]->name }} </p>
		<p>To: {{ $port[($cruise->destination)-1]->name }} </p>
		<p>Departing: {{ $cruise->departure->toDateTimeString() }}</p>
		<p>Arrival: {{ $cruise->arrival->toDateTimeString() }} </p>
	@endforeach
@stop