@foreach ($themes as $theme)
<div class="col-xs-3 col-sm-4 themes">
  <img src="{{$theme->theme}}" alt="">
</div>
@endforeach 
<br><br>
<input type="hidden" name="" value="" class="hidden_input">
<input type="hidden" name="" value="" class="length">
<input type="hidden" name="" value="{{$giftcard}}" class="getgc">
<div class="col-xs-12 col-sm-12">
  <div class="text-right" style="margin:20px 0;">
    <div class="show-more">Show More...</div>
    <div class="show-less">Show Less...</div>
  </div>
</div>
