@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Create Draft Order</h1>
            <form action="/draft-order" method="post">
            	{{ csrf_field() }}
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" name="year" class="form-control" value="2017">
                </div>
                <div class="form-group">
                    <label for="round">Round</label>
                    <input type="text" name="round" class="form-control" value="1">
                </div>
                @for($i = 1; $i <= 32; $i++)
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pick[{{ $i }}]">Pick</label>
                                <input type="text" name="pick[{{ $i }}]" class="form-control" value="{{ $i }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pick[{{ $i }}][team]">Pick</label>
                                <select name="pick[{{ $i }}][team]" class="form-control">
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->short_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pick[{{ $i }}][note]">Notes</label>
                                <input type="text" name="pick[{{ $i }}][note]" class="form-control">
                            </div>
                        </div>
                    </div>
                @endfor
            	
            	<div class="form-group">
            		<input type="submit" value="Create" class="btn btn-primary">
            	</div>
            </form>
        </div>
    </div>
</div>
@endsection
