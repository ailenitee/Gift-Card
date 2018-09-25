$(function() {
  var counter = parseInt($('#counter').val());
  for (var i = 0; i < counter; i++) {
    // alert(i);
    $('.quantity-right-plus').click(function(e){
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
       quantity[i] = parseInt($('.quantity-'+i).val());
       // console.log(quantity[i]);
      // If is not undefined
      $('.quantity-'+i).val(quantity[i] + 1);
      // Increment

    });

    $('.quantity-left-minus').click(function(e){
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
       quantity[i] = parseInt($('.quantity-'+i).val());
      // If is not undefined
      // Increment
      if(quantity>0){
        $('.quantity-'+i).val(quantity[i] - 1);
      }
    });
  }
});
