@extends('layouts.master')

@section('content')

<div class="col-8">
	<h1>{{$user->name}}'s update</h1>
	<form method="POST" action="/user/{{$user->id}}/update/password">
		@csrf
		<div class="form-group">
			<label>Old password</label>
			<input type="password" name="password_old" class="form-control"">
		</div>
		<div class="form-group">
			<label>New password</label>
			<input type="password" name="password" class="form-control"">
		</div>
		<div class="form-group">
			<label>Retype new password</label>
			<input type="password" name="password_confirmation" class="form-control"">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="/user/{{$user->id}}" class="btn btn-outline-primary">Cancel</a>
		</div>
		@include('layouts.errors')
	</form>
	
</div>



@endsection