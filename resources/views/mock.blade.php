@extends('layouts.app')

@section('content')
<div class="container">
    <draft-central user-id="{{ $mock_draft->user_id }}" mock-draft-id="{{ $mock_draft->id }}"></draft-central>
</div>
@endsection
