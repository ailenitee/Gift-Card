// require('./bootstrap.js');
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
require('./components/validation.js');
require('./components/slick.js');
require('./components/upload.js');
require('./components/cartmodal.js');
require('./components/nav.js');



/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

$(function() {
  var referrer =  document.referrer;
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target // newly activated tab
    e.relatedTarget // previous active tab
  })
  $('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
  });
  $('.signup-content-box').css('display','none');
  $('#detailModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });
  $('#detailModalShow').css('cursor','pointer');
  $('#detailModalShow').on('click', function () {
    $('#detailModal').modal('show');
  });
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
  });
  $('a[title]').tooltip();
  $('.create_gc').click(function() {
    window.location.href = '/card/details';
    return false;
  });
  $('.carousel_signup').css('cursor','pointer');
  $('.carousel_signup').click(function() {
    $(this).css('cursor','pointer');
    window.location.href = '/login#signup';
    return false;
  });
  $('.btn-signup').click(function() {
    $('.login-box').css('display','none');
    $('.login-box').css('opacity','0');
    $('.signup-content-box').css('display','block');
    $('.signup-content-box').css('opacity','1');
  });
  $('.back_login').click(function() {
    window.location.href.split('#')[0]
    $('.login-box').css('display','block');
    $('.login-box').css('opacity','1');
    $('.signup-content-box').css('display','none');
    $('.signup-content-box').css('opacity','0');
  });

  //////// add border bottom when link is in active
  if(window.location.href.indexOf("login") > -1) {
    $('.nav-link').removeClass('active');
    $('.login').addClass('active');
    $('.details').removeClass('btn-red');
    if(window.location.href.indexOf("signup") > -1) {
      $('.login-box').css('display','none');
      $('.login-box').css('opacity','0');
      $('.signup-content-box').css('display','block');
      $('.signup-content-box').css('opacity','1');
      $('.details').removeClass('btn-red');
    }else{
      $('.login-box').css('display','block');
      $('.login-box').css('opacity','1');
      $('.signup-content-box').css('display','none');
      $('.signup-content-box').css('opacity','0');
      $('.details').removeClass('btn-red');
    }
  }else if(window.location.href.indexOf("card") > -1){
    $('.nav-link').removeClass('active');
    $('.details').addClass('btn-red');
  }
  var is_root = location.pathname == "/";
  if(is_root){
    $('.nav-link').removeClass('active');
    $('.home').addClass('active');
    $('.details').removeClass('btn-red');
  }

  //////// show more and show less for design card
  $('.show-more').css('cursor','pointer');
  $('.show-less').css('cursor','pointer');
  var size_li = $('div.themes').length;
  var x=4;
  var last = size_li-x;
  $('.hidden_input').val(8);
  $('.themes:lt(13)').hide();
  $('.themes:lt(-'+last+')').show();
  $('.show-less').css('display','none');
  $('.show-more').click(function () {
    if (last == 9) {
      $('.themes:lt(-5)').show();
      $('.length').val(last);
      last = 0;
    }

    if(last != 9){
      var getval = $('.hidden_input').val();
      var sumval = parseInt(getval) + 4;
      $('.hidden_input').val(sumval);
      $('.themes:lt('+getval+')').show();
      if($('.hidden_input').val() == 16){

      }else{
        if($('.hidden_input').val() >= size_li){
          $(this).css('display','none');
          $('.show-less').css('display','block');
        }
      }
    }
  });
  $('.show-less').click(function () {
    var length = parseInt($('.length').val());
    $('.themes:lt(13)').hide();
    $('.themes:lt(-'+length+')').show();
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

  ////////// on click theme img change preview
  $('.themes img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src',imgsrc);
  });

  $('.cart-btn').on('click', function(){
    $('#cartModal').modal('show');
  });

  var sum = 0;
  $('.total-cart').each(function(){
    sum += parseFloat($(this).text());
    $('.total_sum').text(sum);
    $('.total_sum').val(sum);
  });

  if ($('.radiobtns').is(':checked')) {
    $('.radiobtns').parent().removeClass('active');
    $("input[type=radio][name='amount']:checked").parent().addClass('active');
  }
});
