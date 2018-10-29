@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<h1>Publish a post</h1>
	<hr>
 <form method="POST" action="/posts" enctype="multipart/form-data">
 	@csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" >
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control" ></textarea>
  </div>
  <div class="form-group">
    <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="cate">
          <option selected disabled>- Categories -</option>
          @foreach($cates as $cate)
          <option value="{{$cate->id}}">{{$cate->name}}</option>
          @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload post image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
  </div>
 <div class="form-group">
  <button type="submit" class="btn btn-primary">Publish</button>
</div>


  @include('layouts.errors')

</form>


</div>


@endsection