@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<img src="{{ $post->img }}" alt="{{ $post->img }}" class="post">
	<h1>{{$post->title}}</h1>
	<hr>
	@if(count($post->tags))
		<ul>
			@foreach($post->tags as $tag)
				<a href="/posts/tags/{{$tag->name}}">
					<li>{{ $tag->name }} </li>
				</a>
			@endforeach

		</ul>
	@endif
	<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
	
	<p>{{ $post->body }}</p>
	<hr>
	<div class="comments">
		<ul class="list-group">
		@foreach( $post->comments as $comment)
		<li class="list-group-item">
			<strong>{{ $comment->user->name }}: on {{ $comment->created_at->diffForHumans() }}: &nbsp</strong>
			{{ $comment->body }}
		</li>
		
		@endforeach
	</ul>
	</div>
<hr>
<div class="card">
	<div class="card-block">
		<form method="POST" action="/posts/{{$post->id}}/comments">
			@csrf
			<div class="form-group">
				<textarea name="body" class="form-control" placeholder="Comment here"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add comment</button>
			</div>
			@include('layouts.errors')
		</form>
	</div>
</div>

</div>


@endsection