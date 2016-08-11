$(document).ready(function() {
      $('a[href^="#"]').click(function() {
          var target = $(this.hash);
          if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
          if (target.length == 0) target = $('html');
          $('.dropdown.open').dropdown('toggle');
          $('html, body').animate({ scrollTop: target.offset().top }, 500);
          return false;
      });
  });