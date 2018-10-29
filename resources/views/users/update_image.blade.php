@extends('layouts.master')
@section('content')

<div class="col-8">
	<h1>{{$user->name}}'s update</h1>
	<form method="POST" action="/user/{{$user->id}}/update/image" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Profile image</label>
			<input type="file" name="img" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="/user/{{$user->id}}" class="btn btn-outline-primary">Cancel</a>
		</div>
		@include('layouts.errors')
	</form>
	
</div>
@endsection