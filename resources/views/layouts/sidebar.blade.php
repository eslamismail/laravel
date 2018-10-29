 <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              @foreach( $archives as $stats)
              <li>
                <a href="/?month={{$stats['month']}}&year={{$stats['year']}}">
                    {{$stats['month'] .' ' . $stats['year']}}
                </a>
              </li>
              @endforeach
            </ol>
          </div>

          <div class="sidebar-module">
            <h4>Tag</h4>
            <ol class="list-unstyled">
              @foreach( $tags as $tag)
              <li>
                <a href="/posts/tags/{{ $tag }}">
                    {{ $tag }}
                </a>
              </li>
              @endforeach
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
              @foreach($cates as $cate)
              <li>
                <a href="/category/{{$cate->id}}" class="btn btn-primary">
                  <img src="{{$cate->img}}" class="icon">{{$cate->name}}  
                </a>
              </li>
              @endforeach
              <li>
                <a href="/category/add" class="btn btn-outline-primary">
                  Add category
                </a>
              </li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->