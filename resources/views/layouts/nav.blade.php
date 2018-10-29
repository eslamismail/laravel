    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>
          @if(! Auth::check())
          <a class="nav-link" href="/register">Sign up</a>
          <a class="nav-link" href="/login">login</a>
          @endif
          @if(Auth::check())
          <a class="nav-link" href="/posts/create">Publish post</a>
          <a class="nav-link" href="/logout">logout</a>
          <a href="/user/{{Auth::user()->id}}" class="nav-link ml-auto">
            <img src="{{auth()->user()->img}}" class="icon">
            {{ Auth::user()->name }}
          </a>
          @endif
        </nav>
      </div>
    </div>

    
