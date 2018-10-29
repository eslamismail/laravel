@extends('layouts.master')
@section('content')
<div class="col-8">
	

		<h1>
			{{$users->name}}
			<a href="/user/{{$users->id}}/update/name" class="btn btn-outline-info">
				Update your name
			</a>
		</h1>
		
		<hr>
		
		<img src="{{$users->img}}" alt="{{$users->provider}}" class="profile"><br>
		<a href="/user/{{$users->id}}/update/image" class="btn btn-outline-info">
			Update your image
		</a>
		<br>
		<p class="d-inline">Email : {{ $users->email }}</p>
		<a href="/user/{{$users->id}}/update/email" class="btn btn-outline-info">
			Update your Email
		</a>
		<br>
		<p class="d-inline">Password :- xxxxxxxxx</p>
		<a href="/user/{{$users->id}}/update/password" class="btn btn-outline-warning">Update your 	password
		</a>
		

	
</div>



@endsection