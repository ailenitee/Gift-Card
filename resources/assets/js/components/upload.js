$(function() {
  ////////// upload photo with preview
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('.btn-file :file').on('fileselect', function(event, label) {

    var input = $(this).parents('.input-group').find(':text'),
    log = label;

    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
        $('#img-upload').css('display','block');
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgInp").change(function(){
    readURL(this);
  });

  $(".img-input-upload").val($('#img-upload').attr('src'));

  $(".themes img").click(function(){
    var image = $(this).attr('src');
    $(".img-input-upload").val(image);
  });

  $('#img-upload').on('load', function () {
    var image = $(this).attr('src');
    $(".img-input-upload").val(image);
  });

    if( $('.getgc').val() == '' ) {
    }else { 
      $('#img-upload').attr('src', $('.getgc').val());
    }
});
