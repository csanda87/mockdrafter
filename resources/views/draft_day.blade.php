@extends('layouts.app')

@section('content')
<div class="container">
    <draft-central user-id="{{ Request::user()->id }}"></draft-central>
</div>
@endsection
