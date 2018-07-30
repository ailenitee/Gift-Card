<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes"/>
  <title>eGlyphCards</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:500" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <!--stylesheets-->
</head>
<body>
  @include('includes.nav')
  <div class="login-content">
    <div class="login-content-box">
      <div class="blur"> </div>
      <div class="container">
        <div class="login-box">
          <div class="row">
            <div class="col-md-4">
              <div class="login-box-left">
                <img src="{{URL::asset('/img/logo.png')}}" style="width:100%;">
                <br>
                <h2 class="text-center">Not a Member yet?</h2>
                <br>
                <div class="flex-end">
                  <a class="nav-link btn-red btn-full btn-signup" href="#signup">Sign Up for Free</a>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="login-box-right">
                <h2 class="text-center">Login</h2>
                <form class="login_form" action="index.html" method="post">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control">
                  </div>
                  <a class="nav-link btn-border btn-center" href="">Login</a>
                </form>
                <br>
                <h3 class="fancy"><span>Or</span></h3>
                <br>
                <a class="nav-link btn-fb" href="">Sign in with Facebook</a>
                <br>
                <a class="nav-link btn-g" href="">Sign in with Google</a>
              </div>
            </div>
          </div>
        </div>
        @include('signup')
      </div>
    </div>

  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- CORE BOOTSTRAP LIBRARY -->
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
