<!-- PERUSNAVI -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BLÖGI</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class=" {{ Request::is('https://www3.sis.uta.fi/~tl415565/laravel/') ? "active" : "" }} "><a href="https://www3.sis.uta.fi/~tl415565/laravel/">Home</a></li>
            <li class=" {{ Request::is('https://www3.sis.uta.fi/~tl415565/laravel/blog') ? "active" : "" }} "><a href="https://www3.sis.uta.fi/~tl415565/laravel/blog">Blog</a></li>
            <li class=" {{ Request::is('https://www3.sis.uta.fi/~tl415565/laravel/about') ? "active" : "" }} "><a href="https://www3.sis.uta.fi/~tl415565/laravel/about">About</a></li>
            <li class=" {{ Request::is('https://www3.sis.uta.fi/~tl415565/laravel/contact') ? "active" : "" }} "><a href="https://www3.sis.uta.fi/~tl415565/laravel/contact">Contact</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="https://www3.sis.uta.fi/~tl415565/laravel/posts">Posts</a></li>                    
                    <li role="separator" class="divider"></li>
                    <li><a href=" {{ route('logout') }} ">Log out</a></li>
                  </ul>
                </li>
            @else
                
                <a href="{{ route('login') }}" class="btn btn-default">Login</a>
                
            @endif
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>