
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes"/>
  <title>AllGiftCards</title>
  <link rel="icon" href="{{URL::asset('/img/logo-only.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700|Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/v4-shims.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <!--stylesheets-->
  <style media="screen">
    img{
      margin-top: 80px;
    }
    h1{
      font-size: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <img src="{{URL::asset('/img/logo.png')}}" alt="">
      <br><br>
      <h1>COMING SOON</h1>
      <a class="nav-link active home" href="{{ url('/') }}">Go back Home</a>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
