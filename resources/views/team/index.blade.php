@extends('layouts.app')

@section('content')
<div class="container">
	<div class="pull-right">
		<a href="/teams/create" class="btn btn-primary">Create Team</a>
	</div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach($teams as $team)
                    <div class="list-group-item">
                    	{{ $team->short_name }} - {{ $team->name }}
                    	<span class="pull-right">
                    		<form action="/teams/{{ $team->id }}" method="post">
                    			{{ csrf_field() }}
                    			{{ method_field('DELETE') }}

								<input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    		</form>
                    	</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

