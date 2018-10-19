@extends('includes.app')
@include('includes.modal')
@section('content')
<div class="container">
  <div class="content denums">
    <input type="hidden" name="" value="" id="geturl">
    <input type="hidden" name="" value="" id="gettemplate">
    <div class="row">
      <div class="col-md-12">
        <button class="nav-link btn-red btn-center float-right cart-btn"><i class="fa fa-shopping-cart"></i>&nbsp; Cart</button>
      </div>
    </div>
    @if($edit == 'edit')
    <form  class="form_details" action="{{ route('update_cart') }}" enctype="multipart/form-data" method="post" style="width:100%;margin-top:0;">
      @else
      <form  class="form_details" action="{{ route('cart') }}" enctype="multipart/form-data" method="post" style="width:100%;margin-top:0;">
        @endif
        {{ csrf_field() }}
        <h1 class="template-name text-center"></h1><br>
        <input type="hidden" value="{{$user_id}}" name="user_id">
        <input type="hidden" value="{{$brand_id}}" name="brand_id">
        <div class="row">
          <div class="col-md-offset-1 col-md-10">
            @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
              {{ session()->get('error') }}
            </div>
            @endif
            <?php
            $x = 0;
            ?>
            @if($edit == 'edit')
            @include('edit')
            @else
            @foreach ($denum as $k => $result)
            @foreach ($result as $key => $denum)
            <div class="col-md-4">
              <div class="brand-container">
                <img alt="" class="denum" src="{{$denum->theme}}">
                <br>
                <input type="hidden" name="" value="{{$loop->count}}" id="counter">
                <div class="denums-margins">
                  <label class="radio-inline">
                    &#8369; {{$denum->denomination}}
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
                    <input type="text" name="quantityVal[{{$x}}]" class="form-control input-number quantity-{{$key}}" value="0" min="0" max="100">
                    <input type="hidden" name="themeID[{{$x}}]" value="{{$denum->id}}">
                    <span class="input-group-btn">
                      <button type="button" style="margin-top:0; " class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endforeach
            @endif
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-2"></div>
          
          <div class="col-md-8">
            <ul class="nav nav-pills mb-3 send-pills" id="pills-tab" role="tablist">
              <li class="nav-item p-item" id="pillsEmail">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" role="tab" aria-selected="false">
                  <i class="far fa-comment"></i>
                </a>
                <h3>DELIVER</h3>
              </li>
              <li class="nav-item p-item" id="pillsDeliver">
                <a class="nav-link" data-toggle="pill" role="tab" aria-selected="true">
                  <i class="fas fa-at"></i>
                </a>
                <h3>SMS</h3>
              </li>
            </ul>
            <div class="tab-content send-tab-content " id="pills-tabContent">
              @if($edit == 'edit')
              @if($address == '')
              <input type="hidden" name="option" value="sms" class="option">
              @else
              <input type="hidden" name="option" value="deliver" class="option">
              @endif
              @else
              <input type="hidden" name="option" value="deliver" class="option">
              @endif
              @if($edit == 'edit')
              <div class="tab-pane show active" id="pillsEmailContent" role="tabpanel" aria-labelledby="pills-home-tab">
                @else
                <div class="tab-pane show active email-content" id="pillsEmailContent" role="tabpanel" aria-labelledby="pills-home-tab">
                  @endif
                  <div class="form-group">
                    <label>Sender Name</label>
                    <input type="text" class="form-control sender" value="{{$sender ? $sender : ''}}" name="" novalidate>
                  </div>
                  <div class="form-group">
                    <label>Recipient's Name</label>
                    <input type="name" class="form-control name" name="name" value="{{$name ? $name : ''}}">
                  </div>
                  <div class="form-group">
                    <label>Recipient's Address</label>
                    <input type="text" class="form-control " name="address" value="{{$address ? $address : ''}}">
                  </div>
                  <div class="form-group">
                    <label>Recipient's Mobile</label>
                    <input type="number" class="form-control mobile" name="mobile" value="{{$mobile ? $mobile : ''}}">
                  </div>
                </div>
                @if($edit == 'edit')
                <div class="tab-pane" id="pillsDeliverContent" role="tabpanel" aria-labelledby="pills-contact-tab">
                  @else
                  <div class="tab-pane deliver-content" id="pillsDeliverContent" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @endif
                    <div class="form-group">
                      <label>Sender Name</label>
                      <input type="text" class="form-control sender" value="{{$sender ? $sender : ''}}" name="" novalidate>
                    </div>
                    <div class="form-group">
                      <label>Recipient's Name</label>
                      <input type="name" class="form-control name" name="" value="{{$name ? $name : ''}}">
                    </div>
                    <div class="form-group">
                      <label>Recipient's Mobile</label>
                      <input type="number" class="form-control mobile" name="" value="{{$mobile ? $mobile : ''}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="r-details" style="margin-top:0;">
              <div class="col-sm-6">
                @if($edit == 'edit')
                <button type="submit" class="btn-border btn-center" value="update" name='submitbutton'>UPDATE CART</button>
                @else
                <button type="submit" class="btn-border btn-center" value="save" name='submitbutton'>ADD TO CART</button>
                @endif
              </div>
              <div class="col-sm-6">
                @if($edit == 'edit')
                <button type="submit" class="btn-red btn-center" value="update_cart" name='submitbutton'>ADD AND CONFIRM ORDER</button>
                @else
                <button type="submit" class="btn-red btn-center" value="save_cart" name='submitbutton'>ADD AND CONFIRM ORDER</button>
                @endif
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </form>
    </div>
  </div>

  @stop
