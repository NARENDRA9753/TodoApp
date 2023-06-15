@extends('layouts.app')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8" style="padding-top:50px">
                    <div class="card">
                        @if(session('success'))
                        <h1 class="alert alert-success">{{session('success')}}</h1>
                        @endif
                        <div class="card-header"><h1 style="text-align:center"> Add Task </h1></div>
                        <div class="card-body">
                            <form name="my-form" action="{{ route('task.store') }}" method="post">
                                @csrf
                                

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                                        @if($errors->has('title'))
                                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="description" class="form-control" name="description" value=""></textarea>
                                        @if($errors->has('description'))
                                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due_date" class="col-md-4 col-form-label text-md-right">Due Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="due_date" class="form-control" name="due_date" min="{{date('Y-m-d')}}" value="{{ old('due_date') }}">
                                        @if($errors->has('due_date'))
                                        <div class="alert alert-danger">{{ $errors->first('due_date') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Status</label>
                                    <div class="col-md-6">
                                    <select class="form-control" aria-label="Default select example" name="status">
                                        <option selected value="">Select Status</option>
  
                                        <option value="0">Pending</option>
                                        <option value="1">Progress</option>
                                        <option value="2">Completed</option>

                                                </select>
                                    @if($errors->has('status'))
                                        <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                  
                                </div>

                                <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Submit
                                        </button>
                                        <a href="{{ route('task.index')  }}" class="btn btn-primary">
                                        Back
                                        </a>
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
            </div>
        </div>

@endsection