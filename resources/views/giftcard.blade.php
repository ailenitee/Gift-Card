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
          @foreach ($result['denominations'] as $key => $denum)
          <div class="col-md-4">
            <img alt="" class="denum" src="{{URL::asset('/img/denomination/')}}/{{$fword[0]}}-{{$denum}}.jpg">
            <br>
            <div class="denums-margins">
              <label class="radio-inline">
                &#8369; {{$denum}}
              </label>
            </div>
            <br>
            <div class="quantity">
              <label for="" class="text-center">Quantity</label>
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                    <span class="glyphicon glyphicon-minus"></span>
                  </button>
                </span>
                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                <span class="input-group-btn">
                  <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>
                </span>
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
              <input type="name" class="form-control" name="name" required value="">
            </div>
            <div class="form-group">
              <label>Recipient's Email</label>
              <input type="email" class="form-control r_email" name="email" required value="">
            </div>
            <div class="form-group">
              <label>Confirm Recipient's Email</label>
              <input type="email" class="form-control cr_email" required>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

@stop
