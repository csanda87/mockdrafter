@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-2">
			Dirt: 
		</div>
		<div class="col-sm-2">
			Berg: 
		</div>
		<div class="col-sm-2">
			Nickel:
		</div>
		<div class="col-sm-2">
			R3lic:
		</div>
		<div class="col-sm-2">
			Ronko: 
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<h3>Official</h3>
			<div class="list-group">
				<div class="list-group-item">
					1 - CLE<br>
					Myles Garrett
				</div>
				<div class="list-group-item">
					2 - CHI (trade from <br>
					Mitch Trubisky
				</div>
				<div class="list-group-item">
					3 - SF (trade from CHI)<br>
					Solomon Thomas
				</div>
				<div class="list-group-item">
					4 - JAX (trade from CHI)<br>
					Solomon Thomas
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
				<div class="list-group-item">
					
				</div>
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
