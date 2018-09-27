$(function() {
  //get total denominations
  var counter = parseInt($('#counter').val());
  var quantity = [];

  $('.quantity-right-plus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    for (var i = 0; i < counter; i++) {
      quantity[i] = parseInt($('.quantity-'+i).val());
    }
    //get specific textbox
    var _thisinp = $(this).parent().siblings('input[type=text]').val();
    // add the quantity on click
    var final = parseInt(_thisinp) + 1;
    $(this).parent().siblings('input[type=text]').val(final);
  });

  $('.quantity-left-minus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    for (var i = 0; i < counter; i++) {
      quantity[i] = parseInt($('.quantity-'+i).val());
    }
    //get specific textbox
    var _thisinp = $(this).parent().siblings('input[type=text]').val();
    //if input is greater than 0 deduct the quantity
    if(_thisinp>0){
      var final = parseInt(_thisinp) - 1;
      $(this).parent().siblings('input[type=text]').val(final);
    }
  });
});
