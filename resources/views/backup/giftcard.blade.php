@extends('includes.app')
@section('content')
<div class="container">
  <div class="content denums">
    <input type="hidden" name="" value="" id="geturl">
    <input type="hidden" name="" value="" id="gettemplate">
    <form class="" action="index.html" method="post" style="width:100%;">
      <h1 class="template-name text-center"></h1><br>
      <div class="row">
        <div class="col-md-offset-1 col-md-10">
          @foreach ($res as $k => $result)
            @foreach (array_unique($result['denominations']) as $key => $denum) 
            <div class="col-md-4">
              <div class="brand-container">
                @if (File::exists(public_path("/img/denomination/".$fword[0]."-".$denum.".jpg")))
                <img alt="" class="denum" src="{{URL::asset('/img/denomination/')}}/{{$fword[0]}}-{{$denum}}.jpg">
                @else
                <img alt="" class="denum" src="{{URL::asset('/img/denomination/generic-')}}{{$denum}}.jpg">
                @endif
                <br>
                <input type="hidden" name="" value="{{$loop->count}}" id="counter">
                <div class="denums-margins">
                  <label class="radio-inline">
                    &#8369; {{$denum}}
                  </label>
                </div>
                <div class="quantity">
                  <label for="" class="text-center">Quantity</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                        <span class="glyphicon glyphicon-minus"></span>
                      </button>
                    </span>
                    <input type="text" name="quantity" class="form-control input-number quantity-{{$key}}" value="0" min="0" max="100">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endforeach
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="r-details">
            <div class="form-group">
              <label>Recipient's Name</label>
              <input type="name" class="form-control" name="dname" value=" ">
            </div>
            <div class="form-group">
              <label>Recipient's Address</label>
              <input type="text" class="form-control" name="address" value=" ">
            </div>
            <div class="form-group">
              <label>Recipient's Mobile</label>
              <input type="number" class="form-control" name="mobile" value=" ">
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-12">
          <div class="r-details">
            <div class="col-sm-6">
              <button type="submit" class="btn-border btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">ADD TO CART</button>
              <button type="submit" class="btn-border btn-center n_disabled" value="save" name='submitbutton'>ADD TO CART</button>
            </div>
            <div class="col-sm-6">
              <button type="submit" class="btn-red btn-center disabled" style="background-color: #ddd; border:1px solid #ddd;">CONFIRM AND CHECKOUT</button>
              <button type="submit" class="btn-red btn-center n_disabled" name='submitbutton' value="save_cart">CONFIRM AND CHECKOUT</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

@stop
