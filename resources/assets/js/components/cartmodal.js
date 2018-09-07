$(function() {
  $('.cart-btn').on('click', function(){
    $('#cartModal').modal('show');
  });
  $('.delete_link').on('click', function(){
    var pass_id = $(this).siblings('.get_id').val();
    console.log(pass_id);
    $('#pass_id').val(pass_id);
    $('.alert-cart-confirmation').css('display','block');
    $('.alert-cart-confirmation').css('opacity','1');
  });
  $('.clear_link').on('click', function(){
    $('.alert-cart-confirmation-clear').css('display','block');
    $('.alert-cart-confirmation-clear').css('opacity','1');
  });
  $('#yes').on('click', function(){
    var new_id = $('#pass_id').val();
    window.location.href = '/delete-cart/'+new_id;
    return false;
  });
  $('#clear_cart_confirm').on('click', function(){
    window.location.href = '/clear-cart';
    return false;
  });
  $('.cancel').on('click', function(){
    $('.alert-cart-confirmation').css('display','none');
    $('.alert-cart-confirmation').css('opacity','0');
    $('.alert-cart-confirmation-clear').css('display','none');
    $('.alert-cart-confirmation-clear').css('opacity','0');
  });
});
