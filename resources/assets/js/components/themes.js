$(function() {
  ////////// on click theme img change preview
  $('.themes img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src',imgsrc);
  });
  $('.themes1 img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src',imgsrc);
  });
  //on click open modal for all themes
  $('.show-more-designs').css('cursor','pointer')
  $('.show-more-designs').on('click', function(){
    $('#themesModal').modal('show');
  });
  //////// show more and show less for design card
  $('.show-more').css('cursor','pointer');
  $('.show-less').css('cursor','pointer');
  var size_li = $('div.themes').length;
  var x=3;
  var last = size_li-x;
  $('.hidden_input').val(6);
  $('.themes:lt(20)').hide();
  $('.themes:lt(-'+last+')').show();
  $('.show-less').css('display','none');
  $('.show-more').click(function () {
    if (last == 10) {
      $('.themes:lt(-7)').show();
      $('.length').val(last);
      last = 0;
    }

    if(last != 10){
      var getval = $('.hidden_input').val();
      var sumval = parseInt(getval) + 3;
      $('.hidden_input').val(sumval);
      $('.themes:lt('+getval+')').show();
      if($('.hidden_input').val()>= 16){
        // $(this).css('display','none');
        // $('.show-less').css('display','block');
        // $('.hidden_input').val(6);
        if($('.hidden_input').val() >= size_li){
          console.log('size----'+size_li);
          $(this).css('display','none');
          $('.show-less').css('display','block');
          $('.hidden_input').val(6);
          $('.length').val('3');
        }
      }
    }
  });
  $('.show-less').click(function () {
    var length = parseInt($('.length').val());
    $('.themes:lt(13)').hide();
    $('.themes:lt('+length+')').show();
    $('.show-less').css('display','none');
    $('.show-more').css('display','block');
  });

  ////////design choose between standard or upload own photo
  $('.own').css('display','none');
  $('.own').css('opacity','0');
  $('#standard_btn').click(function () {
    $('#photo_btn').removeClass('active');
    $('#standard_btn').addClass('active');
    $('.standard').css('display','block');
    $('.standard').css('opacity','1');
    $('.own').css('display','none');
    $('.own').css('opacity','0');
  });
  $('#photo_btn').click(function () {
    $('#imgInp').attr('type','file');
    $('#standard_btn').removeClass('active');
    $('#photo_btn').addClass('active');
    $('.own').css('display','block');
    $('.own').css('opacity','1');
    $('.standard').css('display','none');
    $('.standard').css('opacity','0');
  });

  $('input[type=radio]').click( function() {
    if ($('input[name=category]:checked').val() == "all") {
      $('.cat-themes').css('display','none');
      $('.all-themes').css('display','block');
    } else if ($('input[name=category]:checked').val() == "birthday") {
      $('.cat-themes').css('display','none');
      $('.bday-themes').css('display','block');
    }else if ($('input[name=category]:checked').val() == "christmas") {
      $('.cat-themes').css('display','none');
      $('.christmas-themes').css('display','block');
    }else if ($('input[name=category]:checked').val() == "congratulations") {
      $('.cat-themes').css('display','none');
      $('.congratulations-themes').css('display','block');
    }else if ($('input[name=category]:checked').val() == "generic") {
      $('.cat-themes').css('display','none');
      $('.generic-themes').css('display','block');
    }else if ($('input[name=category]:checked').val() == "getwell") {
      $('.cat-themes').css('display','none');
      $('.getwell-themes').css('display','block');
    }else if ($('input[name=category]:checked').val() == "love") {
      $('.cat-themes').css('display','none');
      $('.love-themes').css('display','block');
    }
  });
});
