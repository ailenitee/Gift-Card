$(function() {
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target // newly activated tab
    e.relatedTarget // previous active tab
  });
  $('a[title]').tooltip();
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
    var url = $(this).children('a').attr('href');
    if (url == '#home'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#profile'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#messages'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#settings'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#doner'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#six'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
  });
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
    var url = $(this).children('a').attr('href');
    if (url == '#home'){
      $('.tab-pane').removeClass(' active');
      $(url).addClass(' active');
    }
    if (url == '#profile'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass(' active');
    }
    if (url == '#messages'){
      $('.tab-pane').removeClass('in active');
      $(url).addClass(' active');
    }
  });

  //Send gift section
  $('.p-item').on('click', function () {
    $('.p-item').removeClass('show active');
  });
  $('#pillsEmail').children('a').css('background','#116DB6');
  $('#pillsEmail a i').css('color','#fff');
  $('.p-item').css('cursor','pointer');
  $('#pillsEmail').on('click', function () {
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsEmailContent').addClass('show active');
    $(this).children('a').css('background','#116DB6');
    $('#pillsEmail a i').css('color','#fff');
    $('#pillsDeliver a i').css('color','#116DB6');
    $('#pillsDeliver').children('a').css('background','transparent');
    $('#pillsEmailContent input').prop('required',true);
    $('#pillsDeliverContent input').prop('required',false);
    $('.email-content input').val('');
  });
  $('#pillsDeliver').on('click', function () {
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsDeliverContent').addClass('show active');
    $(this).children('a').css('background','#116DB6');
    $('#pillsDeliver a i').css('color','#fff');
    $('#pillsEmail a i').css('color','#116DB6');
    $('#pillsEmail').children('a').css('background','transparent');
    $('#pillsDeliverContent input').prop('required',true);
    $('#pillsEmailContent input').prop('required',false);
    $('.deliver-content input').val('');
  });
});
