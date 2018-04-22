@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>My Mock Drafts</h1>
            <a href="/mock-drafts/create" class="btn btn-primary pull-right">+ Mock Draft</a>
            <div class="clearfix"></div>
            <div class="list-group" style="margin-top: 15px">
                @foreach($mock_drafts as $mock)
                    <a href="/mock-drafts/{{ $mock->id }}" class="list-group-item">
                    	{{ $mock->year }} - {{ $mock->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

