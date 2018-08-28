<div class="row ">
  <div class="col-md-12">
    <h2 class="text-center send-gift">Send Your Gift Card</h2>
    <br>
  </div>
  <div class="col-md-offset-3 col-md-6"> 
    <div class="form-group">
      <label>Recipient's Name</label>
      <input type="name" class="form-control" name="name" required value="{{$name ? $name : ''}}">
    </div>
    <div class="form-group">
      <label>Recipient's Email</label>
      <input type="email" class="form-control r_email" name="email" required value="{{$email ? $email : ''}}">
    </div>
    <div class="alert alert-danger alert-email" style="display:none;opacity:0;">
      <p>Emails don't match</p>
    </div>
    <div class="form-group">
      <label>Confirm Recipient's Email</label>
      <input type="email" class="form-control cr_email">
    </div>
  </div>
</div>
