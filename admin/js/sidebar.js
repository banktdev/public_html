$(document).ready(function() {

  var forType = sessionStorage.forType == undefined ? 1 : sessionStorage.forType;
  var asset_path = "asset/" + forType;

  url_BG = "resource/images/new/" + asset_path + "/BG.png";
  url_sideBG = "resource/images/new/" + asset_path + "/side_bar.png";
  $('body').css('background-image', 'url(' + url_BG + ')');

  if ($(window).width() > 991) {
    $('.sidenav').css('background-image', 'url(' + url_sideBG + ')');
  } else {
    $('.sidenav').css('background-image', 'none');
  }
  $(window).on('resize', function() {
    var win = $(this); //this = window
    if (win.width() > 991) {
      $('.sidenav').css('background-image', 'url(' + url_sideBG + ')');
    } else {
      $('.sidenav').css('background-image', 'none');
    }
  });

  html = '';
  for (let i = 1; i <= 10; i++) {
    html += '<li class="nav-item">';
    html += '<a class="nav-link" href="#" onclick="changeForType(' + i + ')" ';
    if (i == forType) {
      html += 'style=\'background-image: url("resource/images/new/Button.png");';
      html += 'background-repeat: no-repeat;background-size: 130px 35px;background-position: center; \' ';
    }
    html += '>';
    html += '<div class="row text-center text-white">';
    html += '<div class="col pl-1" ';
    if (i == forType) {
      html += 'style="color: khaki;"';
    }
    html += '>';
    html += '<span style="padding-left: 5px;font-family: \'Helvet\';font-size: 150%;letter-spacing: 1px;">';
    html += 'สูตรที่ ' + i + ' </span></div>';
    html += '</div></a></li>';
  }
  html += '<br>';
  $('#navAccordion').append(html);

  $('.nav-link-collapse').on('click', function() {
    $('.nav-link-collapse').not(this).removeClass('nav-link-show');
    $(this).toggleClass('nav-link-show');
  });

});
