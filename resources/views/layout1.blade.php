<div class="container">
  <div class="content">
    <div class="content-about text-center">
      <h1>A gift is more than just words</h1>
      <p>
        With Personalized Gift Cards,
        you can turn your own photos into the best personal gifts to
        the people that matters most and make occasions even more special.
      </p>
      <hr>
    </div>
    <h1 class="text-center">GIFTCARD - always the perfect gift!</h1>
    <br>
    <div class="about">
      <div class="row">
        <div class="col-md-6">
          <div class="list">
            <ul>
              <li>Takes the guess-work out of gift giving. Recipients are sure to get exactly what they want.</li>
              <li>Frees the giver from the hassles of gift-wrapping and delivery.</li>
              <li>Gives the recipient an endless selection of items sold in all SM retail establishments.</li>
              <li>Recipients can shop when they want, where they want.</li>
              <li>Practical, value driven solution for employee recognition, sales and performance incentives and corporate gifting.</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <img src="{{URL::asset('/img/GiftCard/Section2/1.png')}}">
        </div>
      </div>
    </div>

  </div>
</div>
<div class="bg-gray how_works">
  <div class="container">
    <div class="content">
      <h1 class="text-center">How to Send a Personalized Gift Card?</h1>
      <div class="row">
        <div class="col-md-4">
          <div class="works">
            <div class="works_img">
              <img src="{{URL::asset('/img/GiftCard/Section3/s41.png')}}">
            </div>
            <h3>Choose Gift Card</h3>
            <p>
              Select the gift card denomination.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="works">
            <div class="works_img">
              <img src="{{URL::asset('/img/GiftCard/Section3/s42.png')}}">
            </div>
            <h3>Design your Gift Card</h3>
            <p>
              Upload the photo you want to show on the gift card.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="works">
            <div class="works_img">
              <img src="{{URL::asset('/img/GiftCard/Section3/s43.png')}}">
            </div>
            <h3>Complete Your Purchase</h3>
            <p>
              We accept all major credit / debit cards and PayPal.
              The gift card will be sent to the recipient’s email address.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="create_gc">
  <div class="container">
    <div class="create_content">
      <a class="nav-link btn-red btn-center" href="{{ url('/card/details') }}">Start Now</a>
    </div>
  </div>
</div>
@include('index/partners')
@include('index/steps')
