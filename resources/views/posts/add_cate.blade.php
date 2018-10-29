@extends('layouts.master')
@section('content')

<div class="col-8">
	<h1>Add category</h1>
	<form method="POST" action="/category/add" enctype="multipart/form-data">
		@csrf
		<label>Name</label>
		<div class="form-group">
			<input type="text" name="name"  class="form-control" >
		</div>
		<label>Select icon</label>
		<div class="form-group">
		   <input type="file" class="form-control" id="validatedCustomFile" required name="img">
		</div>
		<label>Select category</label>
		<div class="input-group mb-3 form-group">

		  <select class="form-control" id="inputGroupSelect02" name="parent_id">
		    <option selected value="0">- Category -</option>
		    @foreach($cates as $cate)
		    <option value="{{$cate->id}}">{{$cate->name}}</option>
		    @endforeach
		  </select>
		</div>

		 


		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Category</button>
		</div>
		@include('layouts.errors')
	</form>
</div>
@endsection