//sp total toggle
$(function () {
  $('.displayBtn').click(function () {
    $(this).toggleClass("add");
    $('.displayArea').slideToggle();
  });
});


//modal scroll stop
$(function () {
  $('.modal-open').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      $('body').css('overflow-y', 'hidden');
      return false;
    });
  });
  $('.modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    $('body').css('overflow-y','auto');
    return false;
  });
});


//header
//humberger menu
$(function (){
  var $nav   = $('#navArea');
  var $btn   = $('.toggle_btn');
  var $list   = $('.navList li a');
  var open   = 'open'; // class
  // menu open close
  $btn.on( 'click', function() {
    if ( ! $nav.hasClass( open ) ) {
      $nav.addClass( open );
      $btn.addClass( open );
    } else {
      $nav.removeClass( open );
      $btn.removeClass( open );
    }
  });
  $list.on( 'click', function() {
    if ( ! $nav.hasClass( open ) ) {
      $nav.addClass( open );
      $btn.addClass( open );
    } else {
      $nav.removeClass( open );
      $btn.removeClass( open );
    }
  });
});



// PageTop
$(function () {
  let PageTop = $('#js-pageTop');
  PageTop.hide();
  
  $(window).scroll(function () {
      if ($(window).scrollTop() > 400) {
        PageTop.fadeIn();
      } else {
        PageTop.fadeOut(200);
      }
    });
  
  PageTop.on('click', function() {
    $('html, body').animate({scrollTop:0}, 400);
    return false;
  });
});