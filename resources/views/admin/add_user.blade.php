@extends('admin.master')
@if(auth()->user())
@section('content') 
<div class="row">
	<div class="col">
      <form method="POST" action="/admin/adduser">
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
			
				<button type="submit" class="btn btn-primary">Add user</button>
			
		</form>
	</div>
</div>
@include('layouts.errors')
    @endsection
 @endif