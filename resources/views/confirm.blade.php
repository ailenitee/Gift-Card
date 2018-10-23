@extends('includes.app')
@section('content')
<div class="container">
  <div class="content confirm">
    <h1 class="text-center egift">Confirm &amp; Checkout</h1>
    <div class="confirm-box">
      <div class="row" style="width: 100%;margin: 0;">
        <div class="col-sm-12" style="width: 100%;">
          <div class="alert alert-danger alert-cart-confirmation" style="display:none;opacity:0;margin: 0 20px; margin-bottom:20px;">
            <input type="hidden" value="" id="pass_id">
            <p>
              Are you sure you want to delete this item from cart?
              <span style="float:right;">
                <span class="custom_link cart_confirm" style="color: #fff;font-weight:700;"><span id="yes">Yes</span>&nbsp;|&nbsp;<span class="cancel">Cancel</span></span>
              </span>
            </p>
          </div>
        </div>
      </div>
      <div class="row hids-xs" style="width: 90%;margin: 0 auto;">
        <div class="col-md-offset-5 col-md-2">
          <h4 class="text-center">Price</h4>
        </div>
        <div class="col-md-1">
          <h4 class="text-center">Quantity</h4>
        </div>
        <div class="col-md-2">
          <h4 class="text-center">Total</h4>
        </div>
      </div>
      @if(!empty($cartThemes))
      @foreach ($cartThemes as $card)
      <div class="inner-box">
        <div class="row">
          <div class="border-bottom">
            <div class="hid-xs">
              <div class="col-md-2">
                <img src="{{$card->theme}}" alt="" class="confirm_img">
                <br>
                <p class="text-center">From: {{$card->name}}</p>
              </div>
              <div class="col-md-3">
                @if($card->email)
                <p>Send to: {{$card->email}}</p>
                <!-- Deliver -->
                @else
                <p>
                  Deliver to:
                  <br>
                  {{$card->name}}
                  <br>
                  {{$card->mobile}}
                  <br>
                  {{$card->address}}
                </p>
                <!-- end Deliver -->
                @endif
                <p class="text-overflow">Message: {{$card->message}}</p>
              </div>
              <div class="col-md-2">
                {{$card->amount}}
              </div>
              <div class="col-md-1">
                {{$card->quantity}}
              </div>
              <div class="col-md-2">
                <div class="total-cart">
                  {{$card->total}}
                </div>
              </div>
              <div class="col-md-2">
                <input type="hidden" name="id" value="{{$card->id}}">
                <a href="{{url('/edit-cart',$card->id)}}"><i class="fas fa-edit"></i></a>
                <!-- <input type="hidden" name="id" value="{{$card->id}}">
                <a href="{{url('/delete-cart',$card->id)}}">Delete</a> -->
                <input type="hidden" name="id" value="{{$card->id}}" class="get_id">
                <div class="custom_link delete_link"><i class="fas fa-trash"></i></div>
              </div>
            </div>
            <div class="hid-sm">
              <div class="col-xs-4">
                <img src="{{$card->giftcard}}" alt="" class="confirm_img">
                <div class="action_buttons">
                  <input type="hidden" name="id" value="{{$card->id}}">
                  <a href="{{url('/edit-cart',$card->id)}}">Edit</a>&nbsp;
                  <!-- <input type="hidden" name="id" value="{{$card->id}}">
                  <a href="{{url('/delete-cart',$card->id)}}">Delete</a> -->
                  <input type="hidden" name="id" value="{{$card->id}}" class="get_id">
                  <div class="custom_link delete_link">Delete</div>
                </div>
              </div>
              <div class="col-xs-8">
                <p>Send to: <b>{{$card->email}}</b></p>
                <p>From: {{$card->name}}</p>
                <p class="text-overflow">Message: {{$card->message}}</p>
                <p>Amount: {{$card->amount}}</p>
                <p>Quantity: {{$card->quantity}}</p>
                <p>Total: {{$card->total}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="total_sum_p">Total : <span class="total_sum"></span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <a  href="{{url('/brand')}}"class="btn-border btn-center m-bottom">ADD ANOTHER GIFT</a>
      </div>
      <div class="col-md-6">
        <a class="btn-red btn-center" href="{{url('/checkout')}}">CONFIRM AND CHECKOUT</a>
      </div>
    </div>
  </div>
</div>
@stop
