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
              <p>Total Gifts: {{count($cart)}}</p>
              <p>Total: <span class="total_sum"></span></p>
              @if(Auth::guest())
                @if(!empty($cart))
                  @foreach ($cart as $card)
                    @foreach ($card as $cards)
                        @if(isset($cards['total']))
                          <div class="total-cart" style="display:none;">{{$cards['total']}}</div>
                        @endif
                    @endforeach
                  @endforeach
                @endif
              @else
                @foreach ($cart as $card)
                  <div class="total-cart" style="display:none;">{{$card->total}}</div>
                @endforeach
              @endif
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
              <input type="text" class="form-control" value="{{Auth::user() ? Auth::user()->mobile : ''}}" name="mnumber" required placeholder="Phone Number">
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
