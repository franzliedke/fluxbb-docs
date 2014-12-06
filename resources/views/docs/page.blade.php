@extends('app')

@section('content')

<div class="ui page grid">
	<div class="four wide column">
		{!! $index !!}
	</div>
	<div class="twelve wide column">
		{!! $content !!}
	</div>
</div>

@stop
