@extends('master_template')

@section('title')
	Cruises
@stop

@section('content')
	<h3><a href=" {{ action ('CruiseController@show', [ $cruise->id ]) }}">{{ $cruise->name }}</a></h3>
	<p>From: {{ $port[($cruise->origin)]->name }} </p>
	<p>To: {{ $port[($cruise->destination)]->name }} </p>
	<p>Departing: {{ $cruise->departure->toDateTimeString() }}</p>
	<p>Arrival: {{ $cruise->arrival->toDateTimeString() }} </p>

	<h3> Cabins available: </h3>
	@foreach ($cabins as $cabin) 
		<h4> {{ $cabin->id }} </h4>
		<p> {{ $cabin_type->where('id', $cabin->cruise_cabin_id)->pluck('type')->first() }} </p>
		<p> Location: {{ $cabin->location }} </p>
		<p> Available room: {{ $cabin->capacity}} </p>
		<p> Price: RM{{ $cabin_type->where('id', $cabin->cruise_cabin_id)->pluck('price')->first() }} </p>
	@endforeach
@stop