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
                    @foreach($draft_slots as $slot)
                    <tr>
                        <td>{{ $slot->year }}</td>
                        <td>{{ $slot->round }}</td>
                        <td>{{ $slot->pick }}</td>
                        <td>{{ $slot->team->short_name }}</td>
                        <td>{{ $slot->notes }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
