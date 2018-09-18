@foreach ($themes as $theme)
<div class="col-xs-3 col-sm-4 themes1">
  <img src="{{$theme->theme}}" alt="">
</div>
@endforeach
<br><br>
<input type="hidden" name="" value="" class="hidden_input">
<input type="hidden" name="" value="" class="length">
<input type="hidden" name="" value="{{$giftcard}}" class="getgc">
<div class="col-xs-12 col-sm-12">
  <div class="text-right" style="margin:20px 0;">
    <div class="show-more-designs">Show More...</div>
  </div>
</div>
<div class="modal in" id="themesModal" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select a theme for your giftcard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-8">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top:0;">CLOSE</button>
      </div>
    </div>
  </div>
</div>
