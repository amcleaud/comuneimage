function fondBan() {
	var carousel = $('#carousel');
	var image1 = carousel.children('.item.active').find('img');
	var srcImage = image1.attr('src');
	var newSrcImage1 = srcImage.slice(0,-4)+'_gauche.jpg';
	var newSrcImage2 = srcImage.slice(0,-4)+'_droit.jpg';
	carousel.css('background-image', 'url('+newSrcImage1+'), url('+newSrcImage2+')');
}

window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#3e3b44",
      "text": "#ffffff"
    },
    "button": {
      "background": "transparent",
      "text": "#ffffff",
      "border": "#e9701f"
    }
  },
  "position": "top",
  "static": true,
  "content": {
    "message": "En continuant votre navigation, vous acceptez l'utilisation de cookies pour vous proposer des contenus et offres adaptés.",
    "dismiss": "J'ai compris !",
    "link": "En savoir plus",
    "href": "http://comuneimage.eu/p/11-mentions-legales.html"
  }
})});

$(document).ready(function() {
	  fondBan();
      $('a[href^="#contact"]').click(function() {
          $('#newsModal').hide();
          var target = $(this.hash);
          if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
          if (target.length == 0) target = $('html');
          $('.dropdown.open').dropdown('toggle');
          $('html, body').animate({ scrollTop: target.offset().top }, 500);
          return false;
      });
      $('#carousel-principal').on('slide.bs.carousel', function () {
	  	  fondBan();
	    });
  });