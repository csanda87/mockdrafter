@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Create Player</h1>
            <form action="/players" method="post">
            	{{ csrf_field() }}
            	<div class="form-group">
            		<label for="name">Name</label>
            		<input type="text" name="name" class="form-control">
            	</div>
            	<div class="form-group">
            		<label for="school">School</label>
            		<input type="text" name="school" class="form-control">
            	</div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="form-group">
                    <label for="height">Height</label>
                    <input type="text" name="height" class="form-control">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" name="weight" class="form-control">
                </div>
            	<div class="form-group">
            		<input type="submit" value="Create" class="btn btn-primary">
            	</div>
            </form>
        </div>
    </div>
</div>
@endsection
