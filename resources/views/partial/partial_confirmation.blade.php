@if(isset($cruise))
	<h3><a href="{{ action ('CruiseController@show', [ $cruise->id ]) }}">{{ $cruise->name }}</a></h3>
	<p>From: {{ $port[($cruise->origin)-1]->name }} </p>
	<p>To: {{ $port[($cruise->destination)-1]->name }} </p>
	<p>Departing: {{ $cruise->departure->toDateTimeString() }}</p>
	<p>Arrival: {{ $cruise->arrival->toDateTimeString() }} </p>
@endif
	<h4> {{ $cabin->id }} </h4>
	<p> {{ $cabin_type->where('id', $cabin->cruise_cabin_id)->pluck('type')->first() }} </p>
	<p> Location: {{ $cabin->location }} </p>
	<p> Available room: {{ $cabin->capacity}} </p>
	<p> Price: RM {{ $cabin_type->where('id', $cabin->cruise_cabin_id)->pluck('price')->first() }} </p>

{!! Form::submit('Complete Reservation', ['class' => 'btn btn-primary form-control']) !!}