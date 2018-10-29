@extends('admin.master')
@if(auth()->user())
@section('content')
	<form method="POST" action="/admin/post/add">
			@csrf
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Body</label>
				<input type="text" name="body" class="form-control">
			</div>
			<div class="form-group text-center">
				<select class="form-control text-center" name="user_id">
					<option selected disabled >- Select -</option>
					@foreach( $users as $user )
					<option value="{{ $user->id }}">{{ $user->id .' '. '-'.' '.$user->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add post</button>
			</div>
		</form>
		@include('layouts.errors')
@endsection
@endif