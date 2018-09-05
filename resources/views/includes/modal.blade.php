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
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @if(Auth::guest())
                @if(!empty($cart))
                  @foreach ($cart as $card)
                    @foreach ($card as $cards)
                    <tr>
                      <td></td>
                      @if(isset($cards['giftcard']))
                      <td>
                        <img src="{{$cards['giftcard']}}" alt="">
                      </td>
                      @endif
                      @if(isset($cards['amount']))
                      <td>{{$cards['amount']}}</td>
                      @endif
                      @if(isset($cards['quantity']))
                      <td>{{$cards['quantity']}}</td>
                      @endif
                      @if(isset($cards['total']))
                      <td>{{$cards['total']}}</td>
                      @endif
                      <td>
                        @if(isset($cards['id']))
                          <input type="hidden" name="id" value="{{$cards['id']}}">
                          <a href="{{url('/edit-cart',$cards['id'])}}"><i class="fas fa-edit"></i></a>
                        @endif
                      </td>
                      <td>
                        @if(isset($cards['id']))
                          <input type="hidden" name="id" value="{{$cards['id']}}">
                          <a href="{{url('/delete-cart',$cards['id'])}}"><i class="fas fa-trash"></i></a>
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
                  @foreach ($cart as $card)
                    <tr>
                      <th scope="row">{{$card->id}}</th>
                      <td><img src="{{$card->giftcard}}" alt=""></td>
                      <td>{{$card->amount}}</td>
                      <td>{{$card->quantity}}</td>
                      <td>{{$card->total}}</td>
                      <td>
                          <a href="{{url('/edit-cart',$card->id)}}"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                          <a href="{{url('/delete-cart',$card->id)}}"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
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
        @if(!empty($cart))
          @if(count($cart) == 0)
          <a href="{{url('/clear-cart')}}" class="btn btn-red disabled" style="float: right;">Clear Cart</a>
          <a href="{{url('/confirm')}}" class="btn btn-red disabled" style="float: right;">Confirm &amp; Checkout</a>
          @else
          <a href="{{url('/clear-cart')}}" class="btn btn-red" style="float: right; ">Clear Cart</a>
          <a href="{{url('/confirm')}}" class="btn btn-red" style="float: right; ">Confirm &amp; Checkout</a>
          @endif
        @endif
      </div>
    </div>
  </div>
</div>
