@extends('admin.master')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(auth()->user())
<a href="/admin/add/user" class="btn btn-primary">Add user</a>
<div class="row text-center main">
	<div class="col-2">User ID</div>
	<div class="col-2">Name</div>
	<div class="col-3">E-mail</div>
	<div class="col-2">Type</div>
	<div class="col-2">Action</div>
</div>

@foreach( $users as $user)
	<div class="row text-center">
		<div class="col-2">{{$user->id}}</div>
		<div class="col-2">{{$user->name}}</div>
		<div class="col-3">{{$user->email}}</div>
		<div class="col-2">{{$user->type}}</div>
		<div class="col-2">
			<form method="POST" action="user/{{$user->id}}">
				@csrf
				<button class="btn btn-danger">Delete</button>
			</form>
		</div>
	</div>
@endforeach
@endif
@endsection