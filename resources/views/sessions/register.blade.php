@extends('layouts.master')
@section('content')
<div class="col-sm-8 blog-main">
	<h1>Register here</h1>
	<hr>
	<form method="POST" action="/register" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>Password confirmation</label>
			<input type="password" name="password_confirmation" class="form-control">
		</div>

		<div class="form-group">
		   <label for="exampleFormControlFile1">Upload post image</label>
		   <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Register</button>
		</div>
		<div class="form-group">
	        
	            <a href="{{ url('/auth/facebook') }}" class="btn btn-primary">
	            	<i class="fa fa-facebook"></i> Facebook
	            </a>
	        
		</div>


	</form>
	@include('layouts.errors')
</div>
@endsection




		
		

		