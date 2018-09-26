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
require('./components/tabs.js');
require('./components/nav.js');
require('./components/themes.js');
// require('./components/quantity.js');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

$(function() {
  var referrer =  document.referrer;

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
  }
  if(window.location.href.indexOf("card") > -1){
    $('.nav-link').removeClass('active');
    $('.details').addClass('btn-red');
  }
  if(window.location.href.indexOf("contact") > -1){
    $('.nav-link').removeClass('active');
    $('.details').removeClass('btn-red');
    $('.contact').addClass('active');
  }
  var is_root = location.pathname == "/";
  if(is_root){
    $('.nav-link').removeClass('active');
    $('.home').addClass('active');
    $('.details').removeClass('btn-red');
  }

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

  var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];
  var decode = decodeURI(last_part);
  $('#geturl').val(decode);

  var str = $("#geturl").val();
  var spaceChar = str.indexOf(" ");
  var reqstr = str.substring(0,spaceChar);
  $('#gettemplate').val(reqstr);
  $('.template-name').text(decode+" Gift Card");

  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
});
