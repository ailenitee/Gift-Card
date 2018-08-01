<nav class="navbar navbar-expand-lg navbar-light bg-gray">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{URL::asset('/img/logo.png')}}" alt="">
  </a>
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <div id="navbarNavDropdown" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
      <a class="nav-link active home" href="{{ url('/') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link login" href="{{ url('/login') }}">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/login') }}">Contact Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn-border details" href="{{ url('/card/details') }}">Send A Gift Card</a>
    </li>
  </ul>
</div>
</nav>
