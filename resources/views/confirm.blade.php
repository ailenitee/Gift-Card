@extends('includes.app')
@section('content')
<div class="container">
  <div class="content confirm">
    <h1 class="text-center egift">Confirm &amp; Checkout</h1>
    <div class="confirm-box">
      <div class="row" style="width: 90%;margin: 0 auto;">
        <div class="col-md-offset-6 col-md-2">
          <h4 class="text-center">Price</h4>
        </div>
        <div class="col-md-2">
          <h4 class="text-center">Quantity</h4>
        </div>
        <div class="col-md-2">
          <h4 class="text-center">Total</h4>
        </div>
      </div>
      @if(Auth::guest())
      @if(!empty($cart))
      @foreach ($cart as $card)
      @foreach ($card as $cards)
      <div class="row">
        <div class="border-bottom">

          <div class="col-md-2">
            @if(isset($cards['giftcard']))
            <img src="{{$cards['giftcard']}}" alt="" class="confirm_img">
            @endif
          </div>
          <div class="col-md-4">
            @if(isset($cards['email']))
            <p>Send to: {{$cards['email']}}</p>
            @endif
            @if(isset($cards['name']))
            <p>From: {{$cards['name']}}</p>
            @endif
            @if(isset($cards['message']))
            <p>Message: {{$cards['message']}}</p>
            @endif
          </div>
          <div class="col-md-2">
            @if(isset($cards['amount']))
            <div>{{$cards['amount']}}</div>
            @endif
          </div>
          <div class="col-md-2">
            @if(isset($cards['quantity']))
            <div>{{$cards['quantity']}}</div>
            @endif
          </div>
          <div class="col-md-2">
            @if(isset($cards['total']))
            <div class="total-cart">{{$cards['total']}}</div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
      @endforeach
      @else
      <div class="">
        cart is empty
      </div>
      @endif
      @else
      @foreach ($cart as $card)
      <div class="row">
        <div class="border-bottom">
          <div class="col-md-2">
            <img src="{{$card->giftcard}}" alt="" class="confirm_img">
          </div>
          <div class="col-md-4">
            <p>Send to: {{$card->email}}</p>
            <p>From: {{$card->name}}</p>
            <p>Message: {{$card->message}}</p>
          </div>
          <div class="col-md-2">
            {{$card->amount}}
          </div>
          <div class="col-md-2">
            {{$card->quantity}}
          </div>
          <div class="col-md-2">
            <div class="total-cart">
              {{$card->total}}
            </div>
          </div>
        </div>

      </div>
      @endforeach
      @endif
    </div>
    <div class="row">
      <div class="col-md-offset-6 col-md-6">
        <p class="total_sum_p">Total : <span class="total_sum"></span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <a  href="{{url('/card/details')}}"class="btn-border btn-center">ADD ANOTHER GIFT</a>
      </div>
      <div class="col-md-6">
        <a class="btn-red btn-center" href="{{url('/checkout')}}">CONFIRM AND CHECKOUT</a>
      </div>
    </div>
  </div>
</div>
@stop
