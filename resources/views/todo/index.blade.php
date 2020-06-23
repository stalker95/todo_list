@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-beetween">
		<div class="col-md-8 justify-content-between">
		<h1>Todos list</h1>
		<a class="btn btn-primary" href="{{ route('todo.create') }}">Add new</a>
	</div>
	</div>
    <div class="row justify-content-center">

        <div class="col-md-8">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Completed</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($todos as $todo)
    <tr>
      <th scope="row">{{ $todo->id }}</th>
      <th ><a href="{{ route('todo.show', $todo->id) }}">{{ $todo->title }}</a></th>
      <th >
        <input type="checkbox" class="change-status" data-todo={{ $todo->id }} @if($todo->completed) checked="checked"  @endif>
       </th>
       <th>
        <a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">Edit</a>
        <form style="display: inline-block;" onsubmit="return confirm('Delete?');" action="{{ route('todo.destroy',$todo->id)}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">delete</button>
            
          </form>
      </th>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{ $todos->links() }}

           
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

  $(document).ready(function() {
   $(".change-status").change(function() {

    var status;
    if ($(this).is(":checked")) {
       status = 1;
    } else {
       status = 0;
    }

      var id = $(this).attr('data-todo');

     $.ajax({
        url: '{{ route('todo.change-status') }}',
        type: 'POST',
        data:{ "_token": '<?php echo csrf_token() ?>', "id": id, "status": status},
        success: function(data){ 
           alert(data.msg);
           
        }
    });
   
   });
  });

</script>
@endsection