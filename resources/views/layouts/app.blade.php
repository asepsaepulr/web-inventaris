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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="navbar-brand" href="{{ url('/') }}">
                        Users
                </a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @role('admin')
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}"> Users </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('room_index') }}"> Rooms </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('room_index_inventory') }}"> Inventories </a>
                            </li>
                            @endrole
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

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
