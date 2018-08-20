<div class="row">
  <div class="col-md-3">
    <h2>Details</h2>
  </div>
  <div class="col-md-6">
    <input type="hidden" value="{{Auth::user() ? Auth::user()->id : '0'}}" name="user_id">
    <input type="hidden" value="0" name="total">
    <div class="form-group">
      <label>Sender Name</label>
      <input type="text" class="form-control" value="@if(Auth::user()){{ Auth::user()->name }}@endif" name="name" required>
    </div>
    <div class="form-group">
      <label>Optional Message</label>
      <textarea name="message"  class="form-control" rows="4">{{ $message ? $message : ''}}</textarea>
    </div>
    <div class="form-group">
      <label>Amount</label>
    </div>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-secondary active">
        <input type="radio" class="radiobtns" id="option1" autocomplete="off" name="amount" value="500" {{ $amount == '500' ? 'checked' : '' }}> P500
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="radiobtns" id="option2" autocomplete="off" name="amount" value="1000" {{ $amount == '1000' ? 'checked' : '' }}> P1000
      </label>
      <label class="btn btn-secondary">
        <input type="radio" class="radiobtns" id="option3" autocomplete="off" name="amount" value="2000" {{ $amount == '2000' ? 'checked' : '' }}> P2000
      </label>
    </div>
    <div class="form-group">
      <br><label>Quantity</label>
      <input type="text" class="form-control" value="{{$quantity ? $quantity : ''}}" name="quantity" required>
    </div>
  </div>
</div>
