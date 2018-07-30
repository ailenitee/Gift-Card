<nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{URL::asset('/img/logo.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto"> </ul>
        <ul class="navbar-nav">
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
