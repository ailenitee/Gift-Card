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
  <div class="modal-dialog modal-themes" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select a theme for your giftcard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 0 15px;">
        <div class="row">
          <div class="col-md-4">
            <div class="" style="border-right: 1px solid #e9ecef;height: 100%;">
              <br>
              <h5>Design Theme</h4>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="all" checked>
                    All
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="birthday">
                    Birthday
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="christmas">
                    Christmas
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="congratulations">
                    Congratulations
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="generic">
                    Generic
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="getwell">
                    Get Well
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="category" id="" value="love">
                    Love
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              @foreach ($themesAll as $allTheme)
              <div class="all-themes cat-themes">
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
              </div>
              <div class="bday-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'birthday')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              <div class="christmas-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'christmas')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              <div class="congratulations-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'congratulations')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              <div class="generic-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'generic')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              <div class="getwell-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'getwell')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              <div class="love-themes cat-themes" style="display:none;">
                @if($allTheme->category == 'love')
                <div class="col-xs-3 col-sm-4 themes1">
                  <img src="{{$allTheme->theme}}" alt="">
                </div>
                @endif
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close" data-dismiss="modal" style="margin-top:0;">CLOSE</button>
        </div>
      </div>
    </div>
  </div>
