@extends('includes.app')
@section('content')
<div class="container">
  <div class="content confirm" style="padding: 30px 0;">
    <h1 class="text-center egift">Checkout &amp; Payment</h1>
    <div class="checkout_bg">
      <form class="" action="{{ route('cart_transaction') }}" method="post">
        {{ csrf_field() }}
        <div class="order_summary">
          <h4>Order Summary</h4>
          <br>
          <div class="row">
            <div class="col-md-6">
              <p>Total Gift Cards:</p>
              <p>Total Amount:</p>
            </div>
            <div class="col-md-6">
              <p>{{count($cart)}}</p>
              <p>&#8369;<span class="total_sum"></span></p>
              <input type="hidden" name="total" value="" class="total_sum">
              <input type="hidden" name="status" value="pending">
            </div>
          </div>
          @foreach ($cart as $card)
          <div class="total-cart" style="display:none;">{{$card->total}}</div>
          @endforeach 
        </div>
        <hr>
        <div class="m-top">
          <h4>Billing Information</h4>
          <br>
          <div class="form-group">
            <input type="text" class="form-control" name="email" required placeholder="Email" value="{{Auth::user() ? Auth::user()->email : ''}}" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="confirm" required placeholder="Confirm Email Address" value="{{Auth::user() ? Auth::user()->email : ''}}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" required placeholder="Full Name" value="{{Auth::user() ? Auth::user()->name : ''}}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="Address" required placeholder="Address">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="state" required placeholder="State">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="city" required placeholder="City">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="mobile" value="{{Auth::user() ? Auth::user()->mobile : ''}}" required placeholder="Phone Number">
          </div>
        </div>
        <div class="row" style="margin:30px 0;">
          <div class="col-sm-12 col-md-6">
            <a  href="{{url('/card/details')}}"class="btn-border btn-center btn-checkout" style="margin-bottom:15px;">ADD ANOTHER GIFT</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <button type="submit" name="button" class="btn-red btn-center btn-checkout" >CONFIRM AND PAY</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@stop
