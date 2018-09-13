<div class="navbar-top">
  <ul>
    @if(Auth::guest())
    <li class="nav-item">
      <a class="nav-link-top login " href="{{url('/login')}}">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link-top carousel_signup ">Sign Up</a>
    </li>
    @else
    <li class="nav-item">
      <h4 class="nav-link-top login">Hi {{ Auth::user()->name }}!</h4>
    </li>
      <li class="nav-item">
        <a class="nav-link-top logout " href="{{url('/logout')}}">Logout</a>
      </li>
      @endif
    </ul>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <div class="navbar-burger">
      <div class="hamburger hid-sm"><i class="fas fa-bars"></i></div>
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{URL::asset('/img/logo.png')}}" alt="">
      </a>
    </div>
    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" style="display:none;">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button> -->
    <div id="navbarNavDropdown" class="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link active home" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link contact" href="{{ url('/contact') }}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-border details" href="{{ url('/card/details') }}">Send A Gift Card</a>
        </li>
      </ul>
    </div>
  </nav>
