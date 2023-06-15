@extends('layouts.app')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<style>
  .title{
    float:center;
    text-align:center
  }
</style>
<div class="row justify-content-center">
<div class="container" style="padding-top:50px">
    <br>
<div class="card border-0">
	<div class="row">
		
		<aside class="col-sm-5">
<article class="card-body m-0 pt-0 pl-5">
  <div class="title">
	  <h3 class="text-uppercase">{{ $task->title }}</h3>	
  </div>					
<div class="mb-6 mt-6" style="padding-top:10px"> 
    <span class="price-title">Due Date :</span>
		<span class="">{{ $task->due_date }}</span>
</div>
<div class="mb-3 mt-3" style="padding-top:10px"> 
    <span class="price-title ">Status :</span>
		<span class="">      
    @if($task->status == '0')
        <button class="btn btn-{{ $task->due_date < date('Y-m-d') ? 'danger' : 'success' }} ">{{ "Pending"  }}</button>
        @elseif($task->status == '1')
        <button class="btn btn-{{ $task->due_date < date('Y-m-d') ? 'danger' : 'success' }}">{{  "Progress" }}</button>
        @else
        <button class="btn btn-success">
            {{ "Completed" }}
        </button>    
        @endif   
        </span>
</div>
<dl class="item-property" style="padding-top:10px">
  <dt>Description :</dt>
  <dd><p>{{ $task->description }} </p></dd>
</dl>
</article>
		</aside>
		
	</div>
</div>


</div>
</div>
@endsection
<!--container.//-->