<!-- Default Bootstrap Navbar --> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/"><img src="{{ asset('images/logo_words.png') }}" alt="words" height="40" width="100"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
            <a class="nav-link" href="/blog"><i class="fas fa-utensils fa-s fa-fw"></i> All Posts</a>
          </li>
          <!--
          <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
          -->
        </ul>
        
        <ul class = "navbar-nav navbar-right">
            @if (Auth::check())
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('posts.index') }}"><i class="fas fa-list-ul fa-xs fa-fw" style="color: DarkSlateGrey"></i> Posts</a>
                    <a class="dropdown-item" href="{{ route('categories.index') }}"><i class="fas fa-chart-pie fa-xs fa-fw" style="color: DarkSlateGrey"></i> Categories</a>
                    <a class="dropdown-item" href="{{ route('tags.index') }}"><i class="fas fa-tags fa-xs fa-fw" style="color: DarkSlateGrey"></i> Tags</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-xs fa-fw" style="color: DarkSlateGrey"></i> Logout</a>
                  </div>
              </li>
            @else
              <!-- <a href="{{ route('login') }}" class="btn btn-light">Login</a> -->
            @endif
        </ul>    
      </div>
    </nav>