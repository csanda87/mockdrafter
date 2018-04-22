@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Create Mock Draft</h1>
            <form action="/mock-drafts" method="post">
            	{{ csrf_field() }}

            	<div class="form-group">
            		<label for="year">Year</label>
                    <select name="year" class="form-control">
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
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
