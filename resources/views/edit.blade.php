<div class="col-md-offset-4 col-md-4">
  <div class="brand-container">
    <img alt="" class="denum" src="{{$item->theme}}">
    <input type="hidden" name="id" value="{{$id}}">
    <input type="hidden" name="denomination" value="{{$item->denomination}}">
    <br>
    <div class="denums-margins">
      <label class="radio-inline">
        &#8369; {{$item->denomination}}
      </label>
    </div>
    <div class="quantity">
      <label for="" class="text-center">Quantity</label>
      <div class="input-group">
        <span class="input-group-btn">
          <button type="button" style="margin-top:0;" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
            <span class="glyphicon glyphicon-minus"></span>
          </button>
        </span>
        <?php $x++; ?>
            <input type="text" name="quantityVal[{{$x}}]" class="form-control input-number quantity-{{$x}}" value="{{$quantity ? $quantity : '0'}}" min="0" max="100">
            <input type="hidden" name="themeID[{{$x}}]" value="{{$item->id}}">
        <span class="input-group-btn">
          <button type="button" style="margin-top:0; " class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
            <span class="glyphicon glyphicon-plus"></span>
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
