<!-- search result -->

@if(isset($cruises))
	@foreach ($cruises as $cruise)
		<h3><a href="{{ action ('CruiseController@show', [ $cruise->id ]) }}">{{ $cruise->name }}</a></h3>
		<p>From: {{ $port[($cruise->origin)]->name }} </p>
		<p>To: {{ $port[($cruise->destination)]->name }} </p>
		<p>Departing: {{ $cruise->departure->toDateTimeString() }}</p>
		<p>Arrival: {{ $cruise->arrival->toDateTimeString() }} </p>
	@endforeach
@else
	<p>Type your search terms in the box!</p>
@endif