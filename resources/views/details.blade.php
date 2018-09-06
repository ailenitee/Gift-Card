@extends('includes.app')
@section('content')
<div class="details-bg">
  <div class="container">
    <h1 class="text-center egift" style="text-transform:none;">Send eGift Card</h1>
    <div class="row">
      <div class="col-md-12">
        <button class="nav-link btn-red btn-center float-right cart-btn"><i class="fa fa-shopping-cart"></i>&nbsp; Cart</button>
      </div>
    </div>
    @if(session()->has('success'))
    <br>
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif
    @if($edit == 'edit')
    <form action="{{ route('update_cart') }}" enctype="multipart/form-data" method="post" class="form_details">
    @else
    <form action="{{ route('cart') }}" enctype="multipart/form-data" method="post" class="form_details">
    @endif
      {{ csrf_field() }}
      <div class="content d-content design_card" style="margin:0;">
        @include('design')
        <hr>
        @include('cdetails')
        <hr>
        @include('send')
      </div>
      <div class="row">
        @if($edit == 'edit')
        <div class="col-md-6">
          <button type="submit" class="btn-border btn-center n_disabled" value="update" name='submitbutton'>UPDATE ITEM</button>
          <button type="submit" class="btn-border btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">UPDATE ITEM</button>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn-red btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">UPDATE AND CHECKOUT</button>
          <button type="submit" class="btn-red btn-center n_disabled" name='submitbutton' value="update_cart">UPDATE AND CHECKOUT</button>
        </div>
        @else
        <div class="col-md-6">
          <button type="submit" class="btn-border btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">ADD TO CART</button>
          <button type="submit" class="btn-border btn-center n_disabled" value="save" name='submitbutton'>ADD TO CART</button>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn-red btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">CONFIRM AND CHECKOUT</button>
          <button type="submit" class="btn-red btn-center n_disabled" name='submitbutton' value="save_cart">CONFIRM AND CHECKOUT</button>
        </div>
        @endif
      </div>
    </form>
  </div>
</div>
@include('includes.modal')
@stop
