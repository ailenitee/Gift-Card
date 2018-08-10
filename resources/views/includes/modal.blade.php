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
            <tr>
              <th scope="row">1</th>
              <td><img src="{{URL::asset('/img/themes/bday-1.jpg')}}" alt=""></td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Total</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td><img src="{{URL::asset('/img/themes/bday-2.jpg')}}" alt=""></td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Total</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td><img src="{{URL::asset('/img/themes/bday-22.jpg')}}" alt=""></td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Total</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td><img src="{{URL::asset('/img/themes/bday-11.jpg')}}" alt=""></td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Total</td>
            </tr>
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
