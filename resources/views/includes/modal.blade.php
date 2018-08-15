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
              @foreach ($cart as $card)
              <tr>
                  @foreach ($card as $key => $value)
                  <td>{{$value}}</td>
                  @endforeach
              </tr>
              @endforeach
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-red" style="float: right; ">Checkout</button>
      </div>
    </div>
  </div>
</div>
