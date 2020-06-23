@extends('layouts.app')

@section('content')
<div class="container">
	<div class=" mb-2">
    	<h1 class="text-2x1">Edit record</h1>
        <a href="{{ route('todo.index') }}" class="btn btn-success">All todos</a>
        <br>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="col-md-6 justify-content-center">
        		<form action="{{ route('todo.update', $todo->id) }}" method="POST" >
    				@csrf
                    @method('PATCH')
    				<div class="form-group">
    					<input type="text" name="title" class="form-control" value="{{ $todo->title }}">
    				</div>
    				<div class="form-check">
    					<input type="checkbox" name="completed" value="1" class="form-check-input" @if($todo->completed) checked="checked" @endif>
    					<label class="form-check-label" for="exampleCheck1">Completed</label>
  					</div>
    				<input type="submit" value="Update" class="btn btn-primary">
    			</form>
        	</div>
        </div>
    </div>
</div>
@endsection
