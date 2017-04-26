@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Create Team</h1>
            <form action="/teams" method="post">
            	{{ csrf_field() }}
            	<div class="form-group">
            		<label for="short_name">Short Name</label>
            		<input type="text" name="short_name" class="form-control">
            	</div>
            	<div class="form-group">
            		<label for="name">Name</label>
            		<input type="text" name="name" class="form-control">
            	</div>
            	<div class="form-group">
            		<input type="submit" value="Create" class="btn btn-primary">
            	</div>
            </form>
        </div>
    </div>
</div>
@endsection
