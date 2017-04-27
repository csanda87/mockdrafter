@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-2">
			<h3>Official</h3>
			<div class="list-group">
				<div class="list-group-item">
					
				</div>
			</div>
		</div>
		@foreach($mocks as $i => $user_mocks)
			<div class="col-sm-2">
				<h3>{{ $user_mocks[$i]->user ? $user_mocks[$i]->user->name : '' }}</h3>
				<div class="list-group">
					@foreach($user_mocks as $mock)
						<div class="list-group-item">
							{{ $mock->draftSlot->pick }} - {{ $mock->draftSlot->team->short_name }}<br>
							{{ $mock->player->name }}
						</div>
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
