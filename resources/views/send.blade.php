<div class="row ">
  <div class="col-md-12">
    <h2 class="text-center send-gift">Send Your Gift Card</h2>
    <br>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <ul class="nav nav-pills mb-3 send-pills" id="pills-tab" role="tablist">
      <li class="nav-item p-item" id="pillsEmail">
        <a class="nav-link active" data-toggle="pill" role="tab" aria-selected="true">
          <i class="fas fa-at"></i>
        </a>
        <h3>EMAIL</h3>
      </li>
      <li class="nav-item p-item" id="pillsDeliver">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" role="tab" aria-selected="false">
          <i class="far fa-comment"></i>
        </a>
        <h3>DELIVER</h3>
      </li>
    </ul>
    <div class="tab-content send-tab-content" id="pills-tabContent">
      @if($edit == 'edit')
      <div class="tab-pane show active" id="pillsEmailContent" role="tabpanel" aria-labelledby="pills-home-tab">
      @else
      <div class="tab-pane show active email-content" id="pillsEmailContent" role="tabpanel" aria-labelledby="pills-home-tab">
      @endif
        <div class="form-group">
          <label>Recipient's Name</label>
          <input type="name" class="form-control" name="name" required value="{{$name ? $name : ''}}">
        </div>
        <div class="form-group">
          <label>Recipient's Email</label>
          <input type="email" class="form-control r_email" name="email" required value="{{$email ? $email : ''}}">
        </div>
        <div class="form-group">
          <label>Confirm Recipient's Email</label>
          <input type="email" class="form-control cr_email" required>
        </div>
      </div>
      @if($edit == 'edit')
      <div class="tab-pane" id="pillsDeliverContent" role="tabpanel" aria-labelledby="pills-contact-tab">
      @else
      <div class="tab-pane deliver-content" id="pillsDeliverContent" role="tabpanel" aria-labelledby="pills-contact-tab">
      @endif
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
  </div>
</div>
