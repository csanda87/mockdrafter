@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="list-group">
                @foreach($draft_order as $order)
                    <div class="list-group-item">
                        {{ $order->pick }} - {{ $order->team->name }}
                        @if($order->notes)
                            <span class="text-muted"><small>{{ $order->notes }}</small></span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6">
            <div class="list-group">
                @foreach($players as $player)
                    <div class="list-group-item">
                        <strong>{{ $player->position }} - {{ $player->name }}</strong><br>
                        <span class="text-muted">{{ $player->school }} {{ $player->height }} {{ $player->weight }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
