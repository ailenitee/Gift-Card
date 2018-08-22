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
      $('.reg-btn').attr('disabled', false);
    } else {
      $('.reg-btn').attr('disabled', 'disabled');
    }
  });
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

  if ($('.getgc').val() == '') {
    console.log('empty');
  } else {
    console.log($('#imgInp').val());
    $('#img-upload').attr('src', $('.getgc').val());
  }
});

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(4);
module.exports = __webpack_require__(6);


/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {


/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/
__webpack_require__(0);
__webpack_require__(1);
__webpack_require__(2);
__webpack_require__(5);

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
  $('.click').on('click', function () {
    $('.click').removeClass('active');
    $(this).addClass('active');
  });
  $('a[title]').tooltip();
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
  } else if (window.location.href.indexOf("card") > -1) {
    $('.nav-link').removeClass('active');
    $('.details').addClass('btn-red');
  }
  var is_root = location.pathname == "/";
  if (is_root) {
    $('.nav-link').removeClass('active');
    $('.home').addClass('active');
    $('.details').removeClass('btn-red');
  }

  //////// show more and show less for design card
  $('.show-more').css('cursor', 'pointer');
  $('.show-less').css('cursor', 'pointer');
  var size_li = $('div.themes').length;
  var x = 4;
  var last = size_li - x;
  $('.hidden_input').val(8);
  $('.themes:lt(13)').hide();
  $('.themes:lt(-' + last + ')').show();
  $('.show-less').css('display', 'none');
  $('.show-more').click(function () {
    if (last == 9) {
      $('.themes:lt(-5)').show();
      $('.length').val(last);
      last = 0;
    }

    if (last != 9) {
      var getval = $('.hidden_input').val();
      var sumval = parseInt(getval) + 4;
      $('.hidden_input').val(sumval);
      $('.themes:lt(' + getval + ')').show();
      if ($('.hidden_input').val() == 16) {} else {
        if ($('.hidden_input').val() >= size_li) {
          $(this).css('display', 'none');
          $('.show-less').css('display', 'block');
        }
      }
    }
  });

  $('.show-less').click(function () {
    var length = parseInt($('.length').val());
    $('.themes:lt(13)').hide();
    $('.themes:lt(-' + length + ')').show();
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

  ////////// on click theme change preview
  $('.themes img').click(function () {
    var imgsrc = $(this).attr('src');
    $('#img-upload').attr('src', imgsrc);
  });

  $('.cart-btn').on('click', function () {
    $('#cartModal').modal('show');
  });
  var sum = 0;
  $('.total-cart').each(function () {
    sum += parseFloat($(this).text()); // Or this.innerHTML, this.innerText
    $('.total_sum').text(sum);
  });

  $('.form_details input').keyup(function () {
    var empty = false;
    $('.form_details input').each(function () {
      if ($(this).val().length == 0) {
        empty = true;
      }
    });
    if (empty == true) {
      $('.form_details .n_disabled').css('display', 'block');
      $('.form_details .n_disabled').css('opacity', '1');
      $('.form_details .disabled').css('display', 'none');
      $('.form_details .disabled').css('opacity', '0');
    } else {
      $('.form_details .disabled').css('display', 'block');
      $('.form_details .disabled').css('opacity', '1');
      $('.form_details .n_disabled').css('display', 'none');
      $('.form_details .n_disabled').css('opacity', '0');
    }
  });

  if ($('.radiobtns').is(':checked')) {
    $('.radiobtns').parent().removeClass('active');
    $("input[type=radio][name='amount']:checked").parent().addClass('active');
  }
});

/***/ }),
/* 5 */
/***/ (function(module, exports) {

$(function () {
  $('.cart-btn').on('click', function () {
    $('#cartModal').modal('show');
  });
});

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);