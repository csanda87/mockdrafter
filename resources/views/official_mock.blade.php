@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/official-mock" method="post">
	    @foreach($draft_slots as $slot)
			{{ $slot->pick }} {{ $slot->team->name }}<br>
			<input type="hidden" name>
	    @endforeach
    </form>
</div>
@endsection
