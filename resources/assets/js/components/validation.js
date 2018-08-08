$(function() { 
  $('.reg-btn').attr('disabled','disabled');
  $('#customCheck1').change(function(){
    if ($(this).is(':checked')) {
      $('.reg-btn').attr('disabled',false);
    }else{
      $('.reg-btn').attr('disabled','disabled');
    }
  });
});
