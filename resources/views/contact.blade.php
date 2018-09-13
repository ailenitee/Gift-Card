@extends('includes.app')
@section('content')
<div class="container">
  <div class="content">
    <h1 class="text-center">GET IN TOUCH</h1>
    <br>
    <h2 style="color:#111" class="text-center"></h2>
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="form-container">
          <form class="form-contact" action="" method="post">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-red">Submit</button>
          </form>
          <!-- <br><br>
          <p class="text-center">allgiftcards@glyphgames.com.</p> -->
        </div>
      </div>
    </div>

  </div>
</div>

@stop
