<div class="modal in" id="cartModal" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-shopping-cart"></i>&nbsp; Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
          <thead class="">
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">Product</th>
              <th scope="col">Denomination</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <div class="alert alert-danger alert-cart-confirmation" style="display:none;opacity:0;">
            <input type="hidden" value="" id="pass_id">
            <p>
              Are you sure you want to delete this item from cart?
              <span style="float:right;">
                <span class="custom_link cart_confirm"><span id="yes">Yes</span>&nbsp;|&nbsp;<span class="cancel">Cancel</span></span>
              </span>
            </p>
          </div>
          <div class="alert alert-danger alert-cart-confirmation-clear" style="display:none;opacity:0;">
            <input type="hidden" value="" id="pass_id">
            <p>
              Are you sure you want to clear your cart?
              <span style="float:right;">
                <span class="custom_link cart_confirm"><span id="clear_cart_confirm">Yes</span>&nbsp;|&nbsp;<span class="cancel">Cancel</span></span>
              </span>
            </p>
          </div>
          <tbody>
              @if(Auth::guest())
                @if(!empty($cart))
                  @foreach ($cart as $card)
                    @foreach ($card as $cards)
                    <tr>
                      <td>
                        @if(isset($cards['theme']))
                        <img src="{{$cards['theme']}}" alt="">
                        @endif
                      </td>
                      <td>
                        @if(isset($cards['denomination']))
                          {{$cards['denomination']}}
                        @endif
                      </td>
                      <td>
                        @if(isset($cards['quantity']))
                          {{$cards['quantity']}}
                        @endif
                      </td>
                      <td>
                        @if(isset($cards['total']))
                          {{$cards['total']}}
                        @endif
                      </td> 
                      <td>
                        @if(isset($cards['id']))
                          <input type="hidden" name="id" value="{{$cards['id']}}">
                          <a href="{{url('/edit-cart',$cards['id'])}}"><i class="fas fa-edit"></i></a>
                        @endif
                      </td>
                      <td>
                        @if(isset($cards['id']))
                          <input type="hidden" name="id" value="{{$cards['id']}}" class="get_id">
                          <div class="custom_link delete_link"><i class="fas fa-trash"></i><div>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  @endforeach
                  @else
                  <tr>
                    <td colspan="7">
                      <i class="fas fa far fa-shopping-cart" style="font-size: 50px; margin: 20px 0;"></i>
                      <br>
                      Your Cart is Empty
                    </td>
                  </tr>
                  @endif
              @else
                @if(count($cart) > 0)
                  @foreach ($cartThemes as $cards)
                    @foreach ($cards as $card)
                      <tr>
                        <td><img src="{{$card->theme}}" alt=""></td>
                        <td>&#8369; {{$card->denomination}}</td>
                        <td>{{$card->quantity}}</td>
                        <td>{{$card->total}}</td>
                        <td>
                            <a href="{{url('/edit-cart',$card->id)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="{{$card->id}}" class="get_id">
                            <div class="custom_link delete_link"><i class="fas fa-trash"></i><div>
                        </td>
                      </tr>
                    @endforeach
                  @endforeach
                @else
                      <tr>
                        <td colspan="7">
                          <i class="fas fa far fa-shopping-cart" style="font-size: 50px; margin: 20px 0;"></i>
                          <br>
                          Your Cart is Empty
                        </td>
                      </tr>
                @endif
            @endif
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
          @if(Auth::guest())
            @if(empty($cart))
              <a href="" class="btn btn-red disabled" style="float: right;">CLEAR CART</a>
              <a href="" class="btn btn-red disabled" style="float: right;">Confirm &amp; Checkout</a>
            @else
              <div class="btn btn-red clear_link" style="float: right; ">CLEAR CART</div>
              <a href="{{url('/confirm')}}" class="btn btn-red" style="float: right; ">Confirm &amp; Checkout</a>
            @endif
          @else
            @if(!empty($cart))
              @if(count($cart) == 0)
              <a href="" class="btn btn-red disabled" style="float: right;">CLEAR CART</a>
              <a href="" class="btn btn-red disabled" style="float: right;">Confirm &amp; Checkout</a>
              @else
              <div class="btn btn-red clear_link" style="float: right; ">CLEAR CART</div>
              <a href="{{url('/confirm')}}" class="btn btn-red" style="float: right; ">Confirm &amp; Checkout</a>
              @endif
            @endif
          @endif
      </div>
    </div>
  </div>
</div>
