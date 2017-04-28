@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-2">Round 15</div>
		<div class="col-sm-2">
			Dirt: {{ 3+0+2+3+0+0+0+3+0+0+0+1+1+0+0 }}
		</div>
		<div class="col-sm-2">
			Berg: {{ 3+1+0+3+0+0+0+3+0+0+0+1+3+0+0 }}
		</div>
		<div class="col-sm-2">
			Nickel: {{ 3+0+0+0+0+0+3+0+0+0+1+0+0+0 }}
		</div>
		<div class="col-sm-2">
			R3lic: {{ 3+0+0+3+0+0+0+3+0+0+0+2+0+0+0 }}
		</div>
		<div class="col-sm-2">
			Ronko: {{ 3+1+0+3+0+0+0+3+0+0+0+1+0+0+0 }}
		</div>
	</div>
	@php
		$picks = collect([
			[
				'pick' => 1,
				'name' => 'Myles Garrett',
				'team' => 'CLE'
			],
			[
				'pick' => 2,
				'name' => 'Mitch Trubisky',
				'team' => 'CHI'
			],
			[
				'pick' => 3,
				'name' => 'Solomon Thomas',
				'team' => 'SF'
			],
			[
				'pick' => 4,
				'name' => 'Leonard Fournette',
				'team' => 'JAX'
			],
			[
				'pick' => 5,
				'name' => 'Corey Davis',
				'team' => 'TEN'
			],
			[
				'pick' => 6,
				'name' => 'Jamal Adams',
				'team' => 'NYJ'
			],
			[
				'pick' => 7,
				'name' => 'Mike Williams',
				'team' => 'LAC'
			],
			[
				'pick' => 8,
				'name' => 'Christian McCaffrey',
				'team' => 'CAR'
			],
			[
				'pick' => 9,
				'name' => 'John Ross',
				'team' => 'CIN'
			],
			[
				'pick' => 10,
				'name' => 'Patrick Mahomes',
				'team' => 'KC'
			],
			[
				'pick' => 11,
				'name' => 'Marshon Lattimore',
				'team' => 'NO'
			],
			[
				'pick' => 12,
				'name' => 'Deshaun Watson',
				'team' => 'HOU'
			],
			[
				'pick' => 13,
				'name' => 'Haason Reddick',
				'team' => 'ARI'
			],
			[
				'pick' => 14,
				'name' => 'Derek Barnett',
				'team' => 'PHI'
			],
			[
				'pick' => 15,
				'name' => '',
				'team' => 'IND'
			],
			[
				'pick' => 15,
				'name' => 'Malik Hooker',
				'team' => 'IND'
			],
			[
				'pick' => 16,
				'name' => 'Marlon Humphrey',
				'team' => 'BAL'
			],
			[
				'pick' => 17,
				'name' => 'Jonathan Allen',
				'team' => 'WAS'
			],
			[
				'pick' => 18,
				'name' => 'Adoree Jackson',
				'team' => 'TEN'
			]
		]);
	@endphp
	<div class="row">
		<div class="col-sm-2">
			<h3>Official</h3>
			<div class="list-group">
				@foreach($picks as $pick)
					<div class="list-group-item" style="height: 80px">
						{{ $pick['pick'] }} - {{ $pick['team'] }}<br>
						{{ $pick['name'] }}
					</div>
				@endforeach
			</div>
		</div>
		@foreach($mocks as $i => $user_mocks)
			<div class="col-sm-2">
				<h3>{{ $user_mocks[$i]->user ? $user_mocks[$i]->user->name : '' }}</h3>
				<div class="list-group">
					@foreach($user_mocks as $mock)
						<div class="list-group-item" style="height: 80px">
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
