@extends('admin.master')

@if(! auth()->user())

	@section('content')
		<form method="POST" action="/admin/dashboard">
					@csrf
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					@include('layouts.errors')
		</form>





	@endsection

@endif