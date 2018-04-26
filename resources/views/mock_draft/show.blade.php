@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $mock_draft->user->name }}'s {{ $mock_draft->year }} {{ $mock_draft->name }}</h1>
            <small class="text-muted pull-right">{{ $mock_draft->created_at }}</small>
            <div class="clearfix"></div>
            {{-- <a href="/mock-drafts/create" class="btn btn-primary pull-right">+ Mock Draft</a> --}}
            @if($mock_draft->selections->count())
                <div class="list-group">
                    @foreach($mock_draft->selections as $selection)
                        <div class="list-group-item">
                            {{ $selection->draftSlot->pick }}) 
                            {{ $selection->draftSlot->team->short_name }} - 
                            {{ $selection->player->name }}, 
                            {{ $selection->player->position }}, 
                            {{ $selection->player->school }}
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning">
                    <p>No selections have been made.</p>
                    <a href="/mock-drafts/{{ $mock_draft->id }}/selections" class="btn btn-primary btn-sm">Make Selections</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

