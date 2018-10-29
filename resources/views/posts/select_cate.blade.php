@extends('layouts.master')
@section('content')

<div class="col-8">
	<h1>Select parent</h1>
	@foreach($cates as $cate)
		<a href="/posts/cate/{{$cate->id}}/create" class="btn btn-primary"><img src="{{$cate->img}}" class="icon">{{$cate->name}}</a>

	@endforeach
</div>


@endsection