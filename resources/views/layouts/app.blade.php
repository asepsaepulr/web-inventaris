<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </head>

  <style>
body{
    background: #E5E5E5;
}
    .avatar {
  width: 45px;
  height: 45px;
  border-radius: 50%;
}    
 /* The side navigation menu */
 .sidebar {
  margin: 0;
  padding: 0;
  width: 280px;
  background-color: white;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #3A57E8;
  color: white;
  border-radius: 5px;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 280px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
} 

  </style>

  <body>
    <div id="app">
      <!-- TOP NAV BAR -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{url('/images/main-logo.png')}}" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="color:black;">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" style="color:black;">{{ __('Register') }}</a>
                      </li>
                  @endif
                @else
                <img src="{{url('/images/avatar.png')}}" class="avatar"/>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                  {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-white">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a></li>
                  </ul>
                </li>
                @endguest
            </ul>
          </div>
        </div>
      </nav>

      <!-- The sidebar -->
      <div class="sidebar">
        @guest

        @else
          <a href=""> <img src="{{url('/images/dashboard-logo.png')}}"> Dashboard </a>
          <a href=""> <img src="{{url('/images/user-logo.png')}}"> Users</a>
        @endguest
          <a href="/room"> <img src="{{url('/images/room-logo.png')}}"> Room </a>
          <a href="/inventory"> <img src="{{url('/images/inventory-logo.png')}}"> Inventory </a>
      </div>

      <div class="content">
          @yield('content')
      </div>
    </div>
  </body>
</html>
