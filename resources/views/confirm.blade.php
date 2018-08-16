@extends('includes.app')
@section('content')
<div class="container">
  <div class="content confirm">
    <h1 class="text-center egift">Confirm &amp; Checkout</h1>
    <table class="table table-hover">
      <thead class="">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        @if(Auth::guest())
          @if(!empty($cart))
            @foreach ($cart as $card)
              @foreach ($card as $cards)
              <tr>
                  @if(isset($cards['giftcard']))
                    <td></td>
                  @endif
                  @if(isset($cards['giftcard']))
                    <td>
                      <img src="{{$cards['giftcard']}}" alt="" class="confirm_img">
                    </td>
                  @endif
                  @if(isset($cards['amount']))
                    <td>{{$cards['amount']}}</td>
                  @endif
                  @if(isset($cards['quantity']))
                    <td>{{$cards['quantity']}}</td>
                  @endif
                  @if(isset($cards['total']))
                    <td class="total-cart">{{$cards['total']}}</td>
                  @endif
              </tr>
              @endforeach
            @endforeach
          @else
            <tr>
              <td>empty</td>
            </tr>
          @endif
        @else
          @foreach ($cartItems as $card)
          <tr>
            <th scope="row">{{$card->id}}</th>
            <td><img src="{{$card->giftcard}}" alt="" class="confirm_img"></td>
            <td>{{$card->amount}}</td>
            <td>{{$card->quantity}}</td>
            <td class="total-cart">{{$card->total}}</td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
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
