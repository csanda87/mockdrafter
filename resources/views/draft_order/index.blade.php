@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Draft Order</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Round</th>
                        <th>Pick</th>
                        <th>Team</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($draft_order as $order)
                    <tr>
                        <td>{{ $order->year }}</td>
                        <td>{{ $order->round }}</td>
                        <td>{{ $order->pick }}</td>
                        <td>{{ $order->team_id }}</td>
                        <td>{{ $order->notes }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
