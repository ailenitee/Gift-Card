<div class="signup-content-box">
  <div class="signup-box">
    <form role="form" class="signup_form" method="POST" action="{{ route('register') }}">
      {!! csrf_field() !!}
      <h2>Sign up</h2>
      <hr class="colorgraph" style="border:0;border-top: 1.5px solid #116DB6;">
      @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if(session()->has('error'))
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div>
      @endif
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="{{ old('first_name') }}">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="{{ old('last_name') }}">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="User Name" tabindex="3">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="number" name="mnumber" id="" class="form-control input-lg" placeholder="Mobile Number" tabindex="4">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" title="Password should contain an uppercase, lowercase and a number." pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="password" id="password" class="form-control input-lg pw" placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="" id="password_confirmation" class="form-control input-lg cpw" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
        <div class="col-md-12">
          <div class="alert alert-danger alert-password" style="display:none;opacity:0;margin-top: 10px;margin-bottom: 0;">
            <p>Passwords don't match</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="custom-control custom-checkbox" style="margin-top:10px;">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">I agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a>.</label>
          </div>
        </div>

      </div>
      <hr class="colorgraph" style="border:0;border-top: 1px solid #116DB6;">
      <div class="row">
        <div class="col-md-8">
          <p style="margin-top: 12px;">Already have an account?&nbsp;<a href="#" class="back_login"><b>Sign In</b></a></p>
        </div>
        <div class=" col-xs-12 col-md-4">
          <input type="submit" value="Register" class="btn btn-border btn-center reg-btn" tabindex="7" style="width:100%;">
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms &amp; Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
