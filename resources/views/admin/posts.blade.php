@extends('admin.master')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(auth()->user())
<a href="/admin/post/add" class="btn btn-primary">Add Post</a>
<div class="row text-center main">
	<div class="col-2"> Post ID</div>
	<div class="col-2">User that published ID</div>
	<div class="col-2">Title of the post</div>
	<div class="col-2">Post body</div>
	<div class="col-2">Action</div>
</div>
@foreach($posts as $post)
	<div class="row">
		<div class="col-2">{{ $post->id }}</div>
		<div class="col-2">{{$post->user->name}}</div>
		<div class="col-2">{{ $post->title }}</div>
		<div class="col-2">{{$post->body}}</div>
		<div class="col-2 text-center">
			
			<form method="POST" action="posts/{{ $post->id }}">
				@csrf
				<button class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
@endforeach
@endif
@endsection