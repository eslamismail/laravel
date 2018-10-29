@extends('layouts.master')
@section('content')
<div class="col-8">
	<h2>Categories</h2>
	@foreach($posts as $post)
	<img src="{{ $post->img }}" class="post" alt="{{$post->img}}" class="post">
	<h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
	<p>{{$post->body}}</p>
	@endforeach

	
</div>
@endsection