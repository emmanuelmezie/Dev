<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{route('index')}}"><img src="{{asset('assets/img/logo.png')}}" alt="Chime Emmanuel Logo" class="img-fluid rounded-circle"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="{{request()->routeIs('admindashboard') ? 'active' : '' }}" href="{{route('admindashboard')}}">Dashboard</a></li>
          <li><a class="{{request()->routeIs('adminnews') ? 'active' : '' }}" href="{{route('adminnews')}}">Blog</a></li>
          <li><a class="{{request()->routeIs('adminexperience') ? 'active' : '' }}" href="{{route('adminexperience')}}">My Experiences</a></li>
          <li><a class="{{request()->routeIs('adminportfolios') ? 'active' : '' }}" href="{{route('adminportfolios')}}">My Portfolio</a></li>
          <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>