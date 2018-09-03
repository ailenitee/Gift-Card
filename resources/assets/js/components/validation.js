$(function() {
  $('.reg-btn').attr('disabled','disabled');
  $('#customCheck1').change(function(){
    if ($(this).is(':checked')) {
      $('.reg-btn').attr('disabled',false);
    }else{
      $('.reg-btn').attr('disabled','disabled');
    }
  });
  $('.q-val').on('input propertychange paste', function (e) {
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
      this.value = this.value.replace(reg, '');
    }
  });

  // send gift card empty input validation
  $('.form_details input').keyup(function() {
    var empty = false;
    $('.form_details input').each(function() {
      if ($(this).val().length == 0) {
        empty = true;
      }
    });
    if (empty == true) {
      if($(".r_email").val().length != 0 && $(".cr_email").val().length != 0)
      {
        if($(".r_email").val() != $(".cr_email").val())
        {
          $('.form_details .disabled').css('display', 'block');
          $('.form_details .disabled').css('opacity', '1');
          $('.form_details .n_disabled').css('display', 'none');
          $('.form_details .n_disabled').css('opacity', '0');
          $('.alert-email').css('display', 'block');
          $('.alert-email').css('opacity', '1');
        }else{
          $('.form_details .n_disabled').css('display', 'block');
          $('.form_details .n_disabled').css('opacity', '1');
          $('.form_details .disabled').css('display', 'none');
          $('.form_details .disabled').css('opacity', '0');
          $('.alert-email').css('display', 'none');
          $('.alert-email').css('opacity', '0');
        }
      }
    }else {
      $('.form_details .disabled').css('display', 'block');
      $('.form_details .disabled').css('opacity', '1');
      $('.form_details .n_disabled').css('display', 'none');
      $('.form_details .n_disabled').css('opacity', '0');
    }
  });
});
