<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes"/>
  <title>AllGiftCards</title>
  <link rel="icon" href="{{URL::asset('/img/logo-only.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:500" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
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
                <img src="{{URL::asset('/img/logo-only.png')}}">
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
                <h2 class="text-center">
                  <i class="fas fa-user-circle"></i>&nbsp;Login
                </h2>
                <form class="login_form" action="{{ route('user_login') }}" method="post">
                  {!! csrf_field() !!}
                  @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <i class="fas fa-exclamation-circle"></i> {{ Session::get('error') }}
                 </div>
                 @endif
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <button type="submit" name="button" class="nav-link btn-border btn-center" >Login</button>
                </form>
                <br>
                <h3 class="fancy"><span>Or</span></h3>
                <br>
                <a class="nav-link btn-fb" href=""><i class="fab fa-facebook"></i>&nbsp;Sign in with Facebook</a>
                <br>
                <a class="nav-link btn-g" href=""><i class="fab fa-google"></i>&nbsp;Sign in with Google</a>
              </div>
            </div>
          </div>
        </div>
        @include('signup')
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
