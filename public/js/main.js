$(document).ready(function() {
  $('.input').each(function(index) {
    $(this).focus(function() {
      $('.form-label').eq(index).addClass('text-black');
    });

    $(this).blur(function() {
      $('.form-label').eq(index).removeClass('text-black');
    });
  });
});

