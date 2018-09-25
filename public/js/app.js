/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

$(function () {
  $('.reg-btn').attr('disabled', 'disabled');
  $('#customCheck1').change(function () {
    if ($(this).is(':checked')) {
      //sign up form validation
      $('.signup_form input').each(function () {
        if ($(this).val().length == 0) {
          empty = true;
        }
      });
      if (empty == true) {
        if ($(".pw").val().length != 0 && $(".cpw").val().length != 0) {
          if ($(".pw").val() != $(".cpw").val()) {
            $('.reg-btn').attr('disabled', 'disabled');
          } else {
            $('.reg-btn').attr('disabled', false);
          }
        }
      } else {
        $('.reg-btn').attr('disabled', 'disabled');
      }
    } else {
      $('.reg-btn').attr('disabled', 'disabled');
    }
  });
  //sign up form validation
  $('.signup_form input').keyup(function () {
    $('.signup_form input').each(function () {
      if ($(this).val().length == 0) {
        empty = true;
      }
    });
    if (empty == true) {
      if ($(".pw").val().length != 0 && $(".cpw").val().length != 0) {
        if ($(".pw").val() != $(".cpw").val()) {
          $('.reg-btn').attr('disabled', 'disabled');
          $('.alert-password').css('display', 'block');
          $('.alert-password').css('opacity', '1');
        } else {
          $('.reg-btn').attr('disabled', false);
          $('.alert-password').css('display', 'none');
          $('.alert-password').css('opacity', '0');
        }
      }
    } else {
      $('.reg-btn').attr('disabled', 'disabled');
    }
  });
  // send gift card empty input validation
  $('.form_details input').keyup(function () {
    var empty = false;
    $('.form_details input').each(function () {
      if ($(this).val().length == 0) {
        empty = true;
      }
    });
    if (empty == true) {
      if ($('#pillsEmailContent').hasClass('show active')) {
        if ($(".r_email").val().length != 0 && $(".cr_email").val().length != 0) {
          if ($(".r_email").val() != $(".cr_email").val()) {
            $('.form_details .disabled').css('display', 'block');
            $('.form_details .disabled').css('opacity', '1');
            $('.form_details .n_disabled').css('display', 'none');
            $('.form_details .n_disabled').css('opacity', '0');
            $('.alert-email').css('display', 'block');
            $('.alert-email').css('opacity', '1');
          } else {
            $('.form_details .n_disabled').css('display', 'block');
            $('.form_details .n_disabled').css('opacity', '1');
            $('.form_details .disabled').css('display', 'none');
            $('.form_details .disabled').css('opacity', '0');
            $('.alert-email').css('display', 'none');
            $('.alert-email').css('opacity', '0');
          }
        }
      } else {
        $('.form_details .n_disabled').css('display', 'block');
        $('.form_details .n_disabled').css('opacity', '1');
        $('.form_details .disabled').css('display', 'none');
        $('.form_details .disabled').css('opacity', '0');
        $('.alert-email').css('display', 'none');
        $('.alert-email').css('opacity', '0');
      }
    } else {
      $('.form_details .disabled').css('display', 'block');
      $('.form_details .disabled').css('opacity', '1');
      $('.form_details .n_disabled').css('display', 'none');
      $('.form_details .n_disabled').css('opacity', '0');
    }
  });

  $('.q-val').on('input propertychange paste', function (e) {
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
      this.value = this.value.replace(reg, '');
    }
  });

  // send gift card empty input validation
  $('.form_details input').keyup(function () {
    var empty = false;
    $('.form_details input').each(function () {
      if ($(this).val().length == 0) {
        empty = true;
      }
    });
    if (empty == true) {
      if ($(".r_email").val().length != 0 && $(".cr_email").val().length != 0) {
        if ($(".r_email").val() != $(".cr_email").val()) {
          $('.form_details .disabled').css('display', 'block');
          $('.form_details .disabled').css('opacity', '1');
          $('.form_details .n_disabled').css('display', 'none');
          $('.form_details .n_disabled').css('opacity', '0');
          $('.alert-email').css('display', 'block');
          $('.alert-email').css('opacity', '1');
        } else {
          $('.form_details .n_disabled').css('display', 'block');
          $('.form_details .n_disabled').css('opacity', '1');
          $('.form_details .disabled').css('display', 'none');
          $('.form_details .disabled').css('opacity', '0');
          $('.alert-email').css('display', 'none');
          $('.alert-email').css('opacity', '0');
        }
      }
    } else {
      $('.form_details .disabled').css('display', 'block');
      $('.form_details .disabled').css('opacity', '1');
      $('.form_details .n_disabled').css('display', 'none');
      $('.form_details .n_disabled').css('opacity', '0');
    }
  });
  if ($(".cr_email").val()) {
    if ($(".cr_email").val().length == 0) {
      $('.form_details .disabled').css('display', 'block');
      $('.form_details .disabled').css('opacity', '1');
      $('.form_details .n_disabled').css('display', 'none');
      $('.form_details .n_disabled').css('opacity', '0');
    }
  }
});

/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(function () {
  //partner slide
  $('.customer-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 2
      }
    }]
  });
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

$(function () {
  ////////// upload photo with preview
  $(document).on('change', '.btn-file :file', function () {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('.btn-file :file').on('fileselect', function (event, label) {

    var input = $(this).parents('.input-group').find(':text'),
        log = label;

    if (input.length) {
      input.val(log);
    } else {
      if (log) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
        $('#img-upload').css('display', 'block');
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgInp").change(function () {
    readURL(this);
  });

  $(".img-input-upload").val($('#img-upload').attr('src'));

  $(".themes img").click(function () {
    var image = $(this).attr('src');
    $(".img-input-upload").val(image);
  });

  $('#img-upload').on('load', function () {
    var image = $(this).attr('src');
    $(".img-input-upload").val(image);
  });

  if ($('.getgc').val() == '') {} else {
    $('#img-upload').attr('src', $('.getgc').val());
  }
});

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(4);
__webpack_require__(10);
module.exports = __webpack_require__(11);


/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

// require('./bootstrap.js');
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
__webpack_require__(0);
__webpack_require__(1);
__webpack_require__(2);
__webpack_require__(5);
__webpack_require__(6);
__webpack_require__(7);
__webpack_require__(8);
__webpack_require__(9);

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

$(function () {
  var referrer = document.referrer;

  $('.navbar-nav>li>a').on('click', function () {
    $('.navbar-collapse').collapse('hide');
  });
  $('.signup-content-box').css('display', 'none');
  $('#detailModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus');
  });
  $('#detailModalShow').css('cursor', 'pointer');
  $('#detailModalShow').on('click', function () {
    $('#detailModal').modal('show');
  });

  $('.create_gc').click(function () {
    window.location.href = '/card/details';
    return false;
  });
  $('.carousel_signup').css('cursor', 'pointer');
  $('.carousel_signup').click(function () {
    $(this).css('cursor', 'pointer');
    window.location.href = '/login#signup';
    return false;
  });
  $('.btn-signup').click(function () {
    $('.login-box').css('display', 'none');
    $('.login-box').css('opacity', '0');
    $('.signup-content-box').css('display', 'block');
    $('.signup-content-box').css('opacity', '1');
  });
  $('.back_login').click(function () {
    window.location.href.split('#')[0];
    $('.login-box').css('display', 'block');
    $('.login-box').css('opacity', '1');
    $('.signup-content-box').css('display', 'none');
    $('.signup-content-box').css('opacity', '0');
  });

  //////// add border bottom when link is in active
  if (window.location.href.indexOf("login") > -1) {
    $('.nav-link').removeClass('active');
    $('.login').addClass('active');
    $('.details').removeClass('btn-red');
    if (window.location.href.indexOf("signup") > -1) {
      $('.login-box').css('display', 'none');
      $('.login-box').css('opacity', '0');
      $('.signup-content-box').css('display', 'block');
      $('.signup-content-box').css('opacity', '1');
      $('.details').removeClass('btn-red');
    } else {
      $('.login-box').css('display', 'block');
      $('.login-box').css('opacity', '1');
      $('.signup-content-box').css('display', 'none');
      $('.signup-content-box').css('opacity', '0');
      $('.details').removeClass('btn-red');
    }
  }
  if (window.location.href.indexOf("card") > -1) {
    $('.nav-link').removeClass('active');
    $('.details').addClass('btn-red');
  }
  if (window.location.href.indexOf("contact") > -1) {
    $('.nav-link').removeClass('active');
    $('.details').removeClass('btn-red');
    $('.contact').addClass('active');
  }
  var is_root = location.pathname == "/";
  if (is_root) {
    $('.nav-link').removeClass('active');
    $('.home').addClass('active');
    $('.details').removeClass('btn-red');
  }

  $('.cart-btn').on('click', function () {
    $('#cartModal').modal('show');
  });
  var sum = 0;
  $('.total-cart').each(function () {
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
      last_part = parts[parts.length - 1];
  var decode = decodeURI(last_part);
  $('#geturl').val(decode);

  var str = $("#geturl").val();
  var spaceChar = str.indexOf(" ");
  var reqstr = str.substring(0, spaceChar);
  $('#gettemplate').val(reqstr);
  $('.template-name').text(decode + " Gift Card");

  var getUrl = window.location;
  var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
});

/***/ }),
/* 5 */
/***/ (function(module, exports) {

$(function () {
  $('.cart-btn').on('click', function () {
    $('#cartModal').modal('show');
  });
  $('.delete_link').on('click', function () {
    var pass_id = $(this).siblings('.get_id').val();
    console.log(pass_id);
    $('#pass_id').val(pass_id);
    $('.alert-cart-confirmation').css('display', 'block');
    $('.alert-cart-confirmation').css('opacity', '1');
  });
  $('.clear_link').on('click', function () {
    $('.alert-cart-confirmation-clear').css('display', 'block');
    $('.alert-cart-confirmation-clear').css('opacity', '1');
  });
  $('#yes').on('click', function () {
    var new_id = $('#pass_id').val();
    window.location.href = '/delete-cart/' + new_id;
    return false;
  });
  $('#clear_cart_confirm').on('click', function () {
    window.location.href = '/clear-cart';
    return false;
  });
  $('.cancel').on('click', function () {
    $('.alert-cart-confirmation').css('display', 'none');
    $('.alert-cart-confirmation').css('opacity', '0');
    $('.alert-cart-confirmation-clear').css('display', 'none');
    $('.alert-cart-confirmation-clear').css('opacity', '0');
  });
});

/***/ }),
/* 6 */
/***/ (function(module, exports) {

$(function () {
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target; // newly activated tab
    e.relatedTarget; // previous active tab
  });
  $('a[title]').tooltip();
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
    var url = $(this).children('a').attr('href');
    if (url == '#home') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#profile') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#messages') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#settings') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#doner') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
    if (url == '#six') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass('in active');
    }
  });
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
    var url = $(this).children('a').attr('href');
    if (url == '#home') {
      $('.tab-pane').removeClass(' active');
      $(url).addClass(' active');
    }
    if (url == '#profile') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass(' active');
    }
    if (url == '#messages') {
      $('.tab-pane').removeClass('in active');
      $(url).addClass(' active');
    }
  });

  //Send gift section
  $('.p-item').on('click', function () {
    $('.p-item').removeClass('show active');
  });
  $('#pillsEmail').children('a').css('background', '#116DB6');
  $('#pillsEmail a i').css('color', '#fff');
  $('.p-item').css('cursor', 'pointer');
  $('#pillsEmail').on('click', function () {
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsEmailContent').addClass('show active');
    $(this).children('a').css('background', '#116DB6');
    $('#pillsEmail a i').css('color', '#fff');
    $('#pillsDeliver a i').css('color', '#116DB6');
    $('#pillsDeliver').children('a').css('background', 'transparent');
    $('#pillsEmailContent input').prop('required', true);
    $('#pillsDeliverContent input').prop('required', false);
    $('.email-content input').val('');
  });
  $('#pillsDeliver').on('click', function () {
    $('#pills-tabContent .tab-pane').removeClass('show active');
    $('#pillsDeliverContent').addClass('show active');
    $(this).children('a').css('background', '#116DB6');
    $('#pillsDeliver a i').css('color', '#fff');
    $('#pillsEmail a i').css('color', '#116DB6');
    $('#pillsEmail').children('a').css('background', 'transparent');
    $('#pillsDeliverContent input').prop('required', true);
    $('#pillsEmailContent input').prop('required', false);
    $('.deliver-content input').val('');
  });
});

/***/ }),
/* 7 */
/***/ (function(module, exports) {

$(function () {
  $('.hamburger').click(function () {
    $('.navbar-collapse').slideToggle('show');
  });
});

/***/ }),
/* 8 */
/***/ (function(module, exports) {

$(function () {
  ////////// on click theme img change preview
  $('.themes img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src', imgsrc);
  });
  $('.themes1 img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src', imgsrc);
  });
  //on click open modal for all themes
  $('.show-more-designs').css('cursor', 'pointer');
  $('.show-more-designs').on('click', function () {
    $('#themesModal').modal('show');
  });
  //////// show more and show less for design card
  $('.show-more').css('cursor', 'pointer');
  $('.show-less').css('cursor', 'pointer');
  var size_li = $('div.themes').length;
  var x = 3;
  var last = size_li - x;
  $('.hidden_input').val(6);
  $('.themes:lt(20)').hide();
  $('.themes:lt(-' + last + ')').show();
  $('.show-less').css('display', 'none');
  $('.show-more').click(function () {
    if (last == 10) {
      $('.themes:lt(-7)').show();
      $('.length').val(last);
      last = 0;
    }

    if (last != 10) {
      var getval = $('.hidden_input').val();
      var sumval = parseInt(getval) + 3;
      $('.hidden_input').val(sumval);
      $('.themes:lt(' + getval + ')').show();
      if ($('.hidden_input').val() >= 16) {
        // $(this).css('display','none');
        // $('.show-less').css('display','block');
        // $('.hidden_input').val(6);
        if ($('.hidden_input').val() >= size_li) {
          console.log('size----' + size_li);
          $(this).css('display', 'none');
          $('.show-less').css('display', 'block');
          $('.hidden_input').val(6);
          $('.length').val('3');
        }
      }
    }
  });
  $('.show-less').click(function () {
    var length = parseInt($('.length').val());
    $('.themes:lt(13)').hide();
    $('.themes:lt(' + length + ')').show();
    $('.show-less').css('display', 'none');
    $('.show-more').css('display', 'block');
  });

  ////////design choose between standard or upload own photo
  $('.own').css('display', 'none');
  $('.own').css('opacity', '0');
  $('#standard_btn').click(function () {
    $('#photo_btn').removeClass('active');
    $('#standard_btn').addClass('active');
    $('.standard').css('display', 'block');
    $('.standard').css('opacity', '1');
    $('.own').css('display', 'none');
    $('.own').css('opacity', '0');
  });
  $('#photo_btn').click(function () {
    $('#imgInp').attr('type', 'file');
    $('#standard_btn').removeClass('active');
    $('#photo_btn').addClass('active');
    $('.own').css('display', 'block');
    $('.own').css('opacity', '1');
    $('.standard').css('display', 'none');
    $('.standard').css('opacity', '0');
  });

  $('input[type=radio]').click(function () {
    if ($('input[name=category]:checked').val() == "all") {
      $('.cat-themes').css('display', 'none');
      $('.all-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "birthday") {
      $('.cat-themes').css('display', 'none');
      $('.bday-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "christmas") {
      $('.cat-themes').css('display', 'none');
      $('.christmas-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "congratulations") {
      $('.cat-themes').css('display', 'none');
      $('.congratulations-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "generic") {
      $('.cat-themes').css('display', 'none');
      $('.generic-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "getwell") {
      $('.cat-themes').css('display', 'none');
      $('.getwell-themes').css('display', 'block');
    } else if ($('input[name=category]:checked').val() == "love") {
      $('.cat-themes').css('display', 'none');
      $('.love-themes').css('display', 'block');
    }
  });
});

/***/ }),
/* 9 */
/***/ (function(module, exports) {

$(function () {
  var counter = parseInt($('#counter').val());
  for (var i = 0; i < counter; i++) {
    // alert(i);
    $('.quantity-right-plus').click(function (e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      quantity[i] = parseInt($('.quantity-' + i).val());
      // console.log(quantity[i]);
      // If is not undefined
      $('.quantity-' + i).val(quantity[i] + 1);
      // Increment
    });

    $('.quantity-left-minus').click(function (e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      quantity[i] = parseInt($('.quantity-' + i).val());
      // If is not undefined
      // Increment
      if (quantity > 0) {
        $('.quantity-' + i).val(quantity[i] - 1);
      }
    });
  }
});

/***/ }),
/* 10 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 11 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);