/**
 * Author: Kris Olszewski
 * CodePen: http://codepen.io/KrisOlszewski/full/wBQBNX
 */

;(function($, window, document, undefined) {
  
  'use strict';
  
	var $html = $('html');
  
  $html.on('click.ui.dropdown', '.js-dropdown', function(e) {
    e.preventDefault();
    $(this).toggleClass('is-open');
  });
  
  $html.on('click.ui.dropdown', '.js-dropdown [data-dropdown-value]', function(e) {
    e.preventDefault();
    var $item = $(this);
    var $dropdown = $item.parents('.js-dropdown');
    $dropdown.find('.js-dropdown__input').val($item.data('dropdown-value'));
    $dropdown.find('.js-dropdown__current').text($item.text());
  });
  
  $html.on('click.ui.dropdown', function(e) {
    var $target = $(e.target);
    if (!$target.parents().hasClass('js-dropdown')) {
      $('.js-dropdown').removeClass('is-open');
    }
  });
  
   var animating = false,
      submitPhase1 = 1100,
      submitPhase2 = 400,
      logoutPhase1 = 800,
      $login = $(".login"),
      $app = $(".app");
	  
  function ripple(elem, e) {
    $(".ripple").remove();
    var elTop = elem.offset().top,
        elLeft = elem.offset().left,
        x = e.pageX - elLeft,
        y = e.pageY - elTop;
    var $ripple = $("<div class='ripple'></div>");
    $ripple.css({top: y, left: x});
    elem.append($ripple);
  };
  
  $(document).on("click", ".login__submit", function(e) {
    if (animating) return;
    animating = true;
    var that = this;
    ripple($(that), e);
    $(that).addClass("processing");
    setTimeout(function() {
      $(that).addClass("success");
      setTimeout(function() {
        $app.show();
        $app.css("top");
        $app.addClass("active");
      }, submitPhase2 - 70);
      setTimeout(function() {
        $login.hide();
        $login.addClass("inactive");
        animating = false;
        $(that).removeClass("success processing");
      }, submitPhase2);
    }, submitPhase1);
  });
$('.reqChange').click(function(){
    $('.imgCheck').attr('src', 'images/close.png');
    });
});

//EDITABLE дээр class өөрчилдөг JS
$(".editable").bind("keydown", function(event) {
    var target = $(event.target);
    c = event.keyCode;
    
    if(c === 13 || c === 27) {
        $(".editable").blur();
        // Workaround for webkit's bug
        window.getSelection().removeAllRanges();
    }
});

$("[contenteditable='true']").on("focus", function() {
    $(".editable").toggleClass("focus");
});

$("[contenteditable='true']").on("blur", function() {
    $(".editable").toggleClass("focus");
});

$(document).click(function(event) {
  $('.content-list').hide();
});

//SCROLL бүдүүрдэг
