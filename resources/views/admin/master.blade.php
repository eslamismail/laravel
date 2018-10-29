<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="/css/app.css" rel="stylesheet"> 
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/grid.css" rel="stylesheet">


</head>
<body>
	<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/admin">Home</a>
          <a class="nav-link active" href="/admin/users">Users</a>
          <a class="nav-link active" href="/admin/posts">Posts</a>
          <a class="nav-link active" href="/admin/comments">Comments</a>
          <a class="nav-link active" href="/admin/logout">Logout</a>

          
          
        </nav>
      </div>
    </div>
	<div class="container">
		@yield('content')
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
	</div>
</body>
</html>

