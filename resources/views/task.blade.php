@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

        <div class="col-md-12" style="padding-top:50px">
            
        
        @if(session('success'))
        <h1 class="alert alert-success">{{session('success')}}</h1>
        @endif
        <h2 style="text-align:center">Task</h2>            
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                <thead>
                   
                   <th>S.NO</th>
                   <th>Title</th>
                   <th>Due Date</th>
                   <th>Status</th>
                     <th>Action</th>
                </thead>
    <tbody>
        @if(isset($tasks))
        @foreach($tasks as $key => $task) 
    <tr>
     <td>{{  $key+ $tasks->firstItem() }}</td>   
    <td>{{ $task->title }}</td>
    <td>{{ $task->due_date }}</td>
    
    <td>
        @if($task->status == '0')
        <button class="btn btn-{{ $task->due_date < date('Y-m-d') ? 'danger' : 'success' }} ">{{ "Pending"  }}</button>
        @elseif($task->status == '1')
        <button class="btn btn-{{ $task->due_date < date('Y-m-d') ? 'danger' : 'success' }}">{{  "Progress" }}</button>
        @else
        <button class="btn btn-success">
            {{ "Completed" }}
        </button>    
        @endif    
    </td>
    <td>
      <a class="btn btn-primary btn-xs" href="{{ route('task.show',$task->id) }}" ><i class="fa fa-eye" aria-hidden="true" ></i></span></a>
      <a class="btn btn-primary btn-xs" href="@if($task->due_date < date('Y-m-d')) #  @else {{ route('task.edit',$task->id) }} @endif" ><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></span></a>
    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteTask" onclick="deleteTask('{{ $task->id }}')"><i class="fa fa-trash"></i></a></td>
    </tr>
   @endforeach
   @endif

    </tbody>
        
</table>
{{ $tasks->links() }}

        </div>
 <div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" id="taskForm">
        @csrf
        @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="task_id">
        <h3>Are You Sure Delete This Task</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            new swal({
                    title: "Are you sure to delete this business?",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $.ajax({
                            Method: "DELETE",
                            url: urlToRedirect,
                            data: {
                                dataType: 'json',
                                contentType: 'application/json',
                            },
                            success: function(data) {
                                location.href = location.href;
                            },
                        });
                    }
                });
        }
    </script> -->
<script>
    function deleteTask(id){
      let url = "{{ route('task.destroy',':id') }}";
      url = url.replace(':id', id);
        document.getElementById("task_id").value = id;
        $('#taskForm').attr('action', url);
    }
</script>
@endsection
    
    
  