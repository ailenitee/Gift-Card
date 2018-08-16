@extends('includes.app')
@section('content')
<div class="container">
  <div class="content confirm">
    <h1 class="text-center egift">Checkout &amp; Payment</h1>
    <div class="checkout_bg">
      <form class="" action="index.html" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="order_summary">
              <h4>Order Summary</h4>
              <br>
              <p>Total Gifts: </p>
              <p>Total: </p>
            </div>
            <hr>
            <div class="credit_info">
              <h4>Credit Card Information</h4>
              <br>
              <div class="form-group">
                <input type="text" class="form-control" value="" name="cnumber" required placeholder="Card Number">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="" name="expdate" required placeholder="Expiration Date">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="" name="cvv" required placeholder="CVV">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="" name="pcode" required placeholder="Postal Code">
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <h4>Billing Information</h4>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="email" required placeholder="Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="confirm" required placeholder="Confirm Email Address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="name" required placeholder="Full Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="Address" required placeholder="Address">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="state" required placeholder="State">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="city" required placeholder="City">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="" name="mnumber" required placeholder="Phone Number">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="checkout_pay">
      <div class="row">
        <div class="col-md-6">
          <a  href="{{url('/card/details')}}"class="btn-border btn-center">ADD ANOTHER GIFT</a>
        </div>
        <div class="col-md-6">
          <a class="btn-red btn-center" href="{{url('/checkout')}}">CONFIRM AND PAY</a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
