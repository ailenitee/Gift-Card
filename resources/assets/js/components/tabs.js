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
  $('#pillsEmail').children('a').css('background','#dc0e0f');
  $('#pillsEmail a i').css('color','#fff');
  $('.p-item').css('cursor','pointer');

  $('#pillsEmail').on('click', function () {
    showSMS();
  });
  function showSMS(){
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsEmailContent').addClass('show active');
    $('#pillsEmail').children('a').css('background','#dc0e0f');
    $('#pillsEmail a i').css('color','#fff');
    $('#pillsDeliver a i').css('color','#563a34');
    $('#pillsDeliver').children('a').css('background','transparent');
    $('#pillsEmailContent input').prop('required',true);
    $('#pillsDeliverContent input').prop('required',false);
    $('#pillsEmailContent .sender').attr('name','sender');
    $('#pillsEmailContent .mobile').attr('name','mobile');
    $('#pillsEmailContent .name').attr('name','name');
    $('.email-content input').val('');
    $('#option').val('deliver');
  }

  $('#pillsDeliver').on('click', function () {
    showDelivery();
  });
  function showDelivery(){
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsDeliverContent').addClass('show active');
    $('#pillsDeliver').children('a').css('background','#dc0e0f');
    $('#pillsDeliver a i').css('color','#fff');
    $('#pillsEmail a i').css('color','#563a34');
    $('#pillsEmail').children('a').css('background','transparent');
    $('#pillsDeliverContent input').prop('required',true);
    $('#pillsEmailContent input').prop('required',false);
    $('#pillsDeliverContent .sender').attr('name','sender');
    $('#pillsDeliverContent .mobile').attr('name','mobile');
    $('#pillsDeliverContent .name').attr('name','name');
    $('.deliver-content input').val('');
    $('#option').val('sms');
  }
  if($('.option').val()== 'deliver'){
    showSMS();
  }else{
    showDelivery();
  }
});
