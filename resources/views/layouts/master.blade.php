
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/download.ico">

    <title>Post templete</title>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
  </head>

  <body>

@include('layouts.nav')
@if($flash = session('message'))
<div id="flash-message"  class="alert alert-success">
  {{$flash}} 
</div>
@endif


   <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Mine blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
    </div>







<div class="container">
  <div class="row">
@yield('content')

@include('layouts.sidebar')


  </div>
</div>
  
@include('layouts.footer')




<script type="text/javascript" src="/js/animation.js"></script>

  </body>
</html>
