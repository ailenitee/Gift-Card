@if(Auth::guest())
<li class="nav-item">
<a class="nav-link login" href="{{ url('/login') }}">Login</a>
</li>
@else
<li class="nav-item">
<a class="nav-link login" href="{{ url('/logout') }}">Logout</a>
</li>
@endif
