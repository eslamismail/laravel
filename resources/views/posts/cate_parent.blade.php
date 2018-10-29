@extends('layouts.master')
@section('content')

<div class="col-8">
	<a href="/category/add" class="btn btn-outline-primary">Add category</a>
	@foreach($cates as $cate)
	
	<a href="/category/posts/{{ $cate->id }}" class="btn btn-primary"><img src="{{$cate->img}}" class="icon">{{$cate->name}}</a>
	@endforeach

</div>


@endsection