<nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
  <span class="navbar-toggler-icon leftmenutrigger"></span>
  <a class="navbar-brand" href="#">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
  aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <ul class="navbar-nav animate side-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle center-i" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> Submenu <i class="fas fa-user shortmenu animate"></i>
      </a>
      <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div> -->
    </li>
    <li class="nav-item">
      <a class="nav-link center-i" href="#" title="Cart"><i class="fas fa-cart-plus"></i> Cart <i class="fas fa-cart-plus shortmenu animate"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link center-i" href="#" title="Comment"><i class="fas fa-comment"></i> Comment <i class="fas fa-comment shortmenu animate"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-md-auto d-md-flex">
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/logout')}}"><i class="fas fa-key"></i> Logout</a>
    </li>
  </ul>
</div>
</nav>
