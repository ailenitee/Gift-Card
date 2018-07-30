<div class="row">
  <div class="col-xs-3 col-md-3">
    <h2>Design</h2>
  </div>
  <div class="col-md-6">
    <img src="{{URL::asset('/img/themes/bday-1.jpg')}}" id='img-upload' style='width:100%'>
    <h4>Choose a theme</h4>
    <div class="choose_btn">
      <div class="row">
        <div class="col-md-6">
          <button type="button" class="btn btn-outline-primary active" id="standard_btn">Standard</button>
        </div>
        <div class="col-md-6">
          <button type="button" class="btn btn-outline-primary" id="photo_btn">Your Photo</button>
        </div>
      </div>
    </div>
    <div class="standard">
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/bday-1.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/bday-2.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/bday-11.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/bday-22.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/generic1-1.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/generic1-2.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/generic1-3.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/gift-3.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/xmas-3.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/XMAS-4.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/xmas-11.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/xmas-22.jpg')}}" alt="">
      </div>
      <div class="col-xs-3 col-md-3 themes">
        <img src="{{URL::asset('/img/themes/XMAS-33.jpg')}}" alt="">
      </div>
      <br><br>
      <input type="hidden" name="" value="" class="hidden_input">
      <input type="hidden" name="" value="" class="length">
      <div class="col-md-12">
        <div class="text-right" style="margin:20px 0;">
          <div class="show-more">Show More...</div>
          <div class="show-less">Show Less...</div>
        </div>
      </div>
    </div>
    <div class="own">
      <div class="col-md-12">
        <div class="form-group">
          <label>Upload Image</label>
          <br>
          <div class="input-group upload-file">
            <input type="text" class="form-control" readonly>
            <span class="input-group-btn">
              <span class="btn btn-default btn-file">
                <input type="file" id="imgInp">
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-3 col-md-3"></div>
</div>
