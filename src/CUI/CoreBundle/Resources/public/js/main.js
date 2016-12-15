function fondBan() {
	var carousel = $('#carousel');
	var image1 = carousel.children('.item.active').find('img');
	var srcImage = image1.attr('src');
	var newSrcImage1 = srcImage.slice(0,-4)+'_gauche.jpg';
	var newSrcImage2 = srcImage.slice(0,-4)+'_droit.jpg';
	carousel.css('background-image', 'url('+newSrcImage1+'), url('+newSrcImage2+')');
}

$(document).ready(function() {
	  fondBan();
      $('a[href^="#contact"]').click(function() {
          var target = $(this.hash);
          if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
          if (target.length == 0) target = $('html');
          $('.dropdown.open').dropdown('toggle');
          $('html, body').animate({ scrollTop: target.offset().top }, 500);
          return false;
      });
      $('#carousel-principal').on('slide.bs.carousel', function () {
	  	fondBan();
	})
  });