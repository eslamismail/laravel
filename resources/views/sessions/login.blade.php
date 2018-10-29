@extends('layouts.master')
@section('content')
	<div class="col-sm-8 blog-main">
		<h1> Login </h1>
		<hr>
		<div class="card">
			<form method="POST" action="/sessions">
				@csrf
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
				<div class="form-group">
					
				</div>
				<div class="form-group">
			        <div class="col-md-6 col-md-offset-4">
			            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook">
			            	<i class="fa fa-facebook"></i> Facebook
			            </a>
			        </div>
    			</div>
				@include('layouts.errors')

			</form>
		</div>
	</div>
@endsection