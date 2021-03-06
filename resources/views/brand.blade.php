@extends('includes.app')
@section('content')
<div class="container">
  <div class="content brands">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Select a Brand</h1>
        <br><br>
      </div>
      @foreach ($brand as $k => $result)
        <div class="col-md-4">
          <a href="{{url('/brand/giftcard')}}/{{$result->brand}}">
            <img src="{{$result->logo}}"onerror="this.onerror=null;this.src='{{URL::asset('/img/denomination/Brands/generic1-2.jpg')}}'">
          </a>
        </div>
      @endforeach
    </div>
  </div>
</div>

@stop
