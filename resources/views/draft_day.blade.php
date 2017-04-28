@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-2">Round 5</div>
		<div class="col-sm-2">
			Dirt: 8
		</div>
		<div class="col-sm-2">
			Berg: 7
		</div>
		<div class="col-sm-2">
			Nickel: 3
		</div>
		<div class="col-sm-2">
			R3lic: 6
		</div>
		<div class="col-sm-2">
			Ronko: 7
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
					2 - CHI<br>
					Mitch Trubisky
				</div>
				<div class="list-group-item">
					3 - SF<br>
					Solomon Thomas
				</div>
				<div class="list-group-item">
					4 - JAX<br>
					Leonard Fournette
				</div>
				<div class="list-group-item">
					5 - TEN<br>
					Corey Davis
				</div>
				<div class="list-group-item">
					6 - NYJ<br>
					
				</div>
				<div class="list-group-item">
					7 - LAC<br>
				</div>
				<div class="list-group-item">
					8 - CAR<br>
				</div>
				<div class="list-group-item">
					9 - CIN<br>
					
				</div>
				<div class="list-group-item">
					10 - BUF<br>
					
				</div>
				<div class="list-group-item">
					11 - NO<br>
					
				</div>
				<div class="list-group-item">
					12 - CLE<br>
					
				</div>
				<div class="list-group-item">
					13 - ARI<br>
					
				</div>
				<div class="list-group-item">
					14 - PHI<br>
					
				</div>
				<div class="list-group-item">
					15 - IND<br>
					
				</div>
				<div class="list-group-item">
					16 - BAL<br>
					
				</div>
				<div class="list-group-item">
					17 - WAS<br>
					
				</div>
				<div class="list-group-item">
					18 - TEN<br>
					
				</div>
				<div class="list-group-item">
					19 - TB<br>
					
				</div>
				<div class="list-group-item">
					20 - DEN<br>
					
				</div>
				<div class="list-group-item">
					21 - DET<br>
					
				</div>
				<div class="list-group-item">
					22 - MIA<br>
					
				</div>
				<div class="list-group-item">
					23 - NYG<br>
					
				</div>
				<div class="list-group-item">
					24 - OAK<br>
					
				</div>
				<div class="list-group-item">
					25 - HOU<br>
					
				</div>
				<div class="list-group-item">
					26 - SEA<br>
					
				</div>
				<div class="list-group-item">
					27 - KC<br>
					
				</div>
				<div class="list-group-item">
					28 - DAL<br>
					
				</div>
				<div class="list-group-item">
					29 - GB<br>
					
				</div>
				<div class="list-group-item">
					30 - PIT<br>
					
				</div>
				<div class="list-group-item">
					31 - ATL<br>
					
				</div>
				<div class="list-group-item">
					32 - NO<br>
					
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
