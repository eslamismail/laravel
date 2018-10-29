@extends('admin.master')
@if(auth()->user())
@section('content')
<form method="POST" action="/admin/comment/add">
	@csrf
	<div class="form-group">
		<label>Body</label>
		<input type="text" name="body" class="form-control">
	</div>
	<div class="form-group">
		<label>Select user who Commented</label>
		<select class="form-control " name="user_id">
			<option selected disabled >- Select -</option>
			@foreach( $users as $user )
			<option value="{{ $user->id }}">{{ $user->id .' '. '-'.' '.$user->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Select Post what you want to comment</label>
		<select class="form-control text-center" name="post_id">
			<option selected disabled >- Select -</option>
			@foreach( $posts as $post )
			<option value="{{ $post->id }}">{{ $post->id .' '. '-'.' '.$post->title }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add comment</button>
	</div>
</form>
@include('layouts.errors')
@endsection
@endif