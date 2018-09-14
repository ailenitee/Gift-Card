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
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 2:
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

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(2);


/***/ })

/******/ });