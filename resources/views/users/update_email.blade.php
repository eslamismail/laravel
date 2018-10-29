@extends('layouts.master')
@section('content')
<div class="col-8">
	<h1>{{$user->name}}'s update</h1>
	<form method="POST" action="/user/{{$user->id}}/update/email" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="/user/{{$user->id}}" class="btn btn-outline-primary">Cancel</a>
		</div>
		@include('layouts.errors')
	</form>
</div>


@endsection