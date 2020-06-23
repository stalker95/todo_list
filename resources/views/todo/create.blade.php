@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" mb-2">
    	<h1 class="text-2x1">What do you need to do</h1>
        <a href="{{ route('todo.index') }}" class="btn btn-success">All todos</a>
        <br>
    </div>
        <div class="row">
        	<div class="col-md-6 justify-content-center">
        		<form action="{{ route('todo.store') }}" method="POST" >
    				@csrf
                    @method('POST')
    				<div class="form-group">
    					<input type="text" name="title" class="form-control">
    				</div>
    				<input type="submit" value="create" class="btn btn-primary">
    			</form>
        	</div>
        </div>
    	
    </div>
</div>
@endsection
