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
    console.log(url);
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
});
