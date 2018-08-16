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
                <td><img src="{{$card->giftcard}}" alt=""></td>
                <td>{{$card->amount}}</td>
                <td>{{$card->quantity}}</td>
                <td>{{$card->total}}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <a href="{{url('/confirm')}}" class="btn btn-red" style="float: right; ">Confirm &amp; Checkout</a>
      </div>
    </div>
  </div>
</div>
