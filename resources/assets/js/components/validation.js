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
});
