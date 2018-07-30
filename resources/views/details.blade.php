@extends('includes.app')
@section('content')
<div class="container">
  <h1 class="text-center egift" style="text-transform:none;">Send eGift Card</h1>
  <div class="row">
    <div class="col-md-offset-8 col-md-4">
      <a class="nav-link btn-red btn-center float-right" href=""><i class="fa fa-shopping-cart"></i>&nbsp; Cart</a>
    </div>
  </div>
<form action="" method="post" class="form_details">
  <div class="content d-content design_card" style="margin:0;">
      @include('design')
      <hr>
      @include('cdetails')
      <hr>
      @include('send')
  </div>
  <div class="row">
    <div class="col-md-6">
      <a class="btn-border btn-center" href="">ADD TO CART</a>
    </div>
    <div class="col-md-6">
      <a class="btn-red btn-center" href="">CONFIRM AND CHECKOUT</a>
    </div>
  </div>
  </form>
</div>
@stop
