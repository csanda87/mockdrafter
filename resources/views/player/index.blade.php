@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Players</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>Position</th>
                        <th>Height</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $i => $player)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->school }}</td>
                        <td>{{ $player->position }}</td>
                        <td>{{ $player->height }}</td>
                        <td>{{ $player->weight }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
