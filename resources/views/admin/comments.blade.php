@extends('admin.master')
@if(auth()->user())
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="/admin/comments/add" class="btn btn-primary">Add comment</a>
<div class="row text-center main">
	<div class="col-2">Comment ID</div>
	<div class="col-2">User that commented</div>
	<div class="col-2">Post of that comment</div>
	<div class="col-2">Comment</div>
	<div class="col-2">Action</div>
</div>
@foreach( $comments as $comment)
<div class="row text-center">
	<div class="col-2">{{ $comment->id }}</div>
	<div class="col-2">{{ $comment->user->name }}</div>
	<div class="col-2">{{ $comment->post->title }}</div>
	<div class="col-2">{{ $comment->body }}</div>

	<div class="col-2">
		
		<form method="POST" action="comments/{{$comment->id}}">
			@csrf
			<button class="btn btn-danger">Delete</button>
		</form>
	</div>

</div>

@endforeach

@endsection
@endif