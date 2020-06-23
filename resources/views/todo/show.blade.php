@extends('layouts.app')

@section('content')
<div class="container">
	<div class=" mb-2">
    	<h1 class="text-2x1">Show record</h1>
        <a href="{{ route('todo.index') }}" class="btn btn-success">All todos</a>
        <br>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="col-md-12 justify-content-center">
        		<h1>Title: {{ $todo->title }}</h1>
        	</div>
        </div>
    </div>
</div>
@endsection
