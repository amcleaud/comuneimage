$(document).ready(function() {
            $("#content-slider").lightSlider({
                item: 4,
                loop:true,
                keyPress:true,
                prevHtml: '<img src="/web/upload/images/scroll_left.jpg" alt="&laquo;" />',
                nextHtml: '<img src="/web/upload/images/scroll_right.jpg" alt="&raquo;" />',
                verticalHeight:200,
                vThumbWidth:170
            });
        });

$("#newsModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-content").load(link.attr("href"), function(){
        $(this).find(".carousel").carousel({interval:2000, pause: "false"});
        $('.carousel').find('.item').click(function(){
            $(this).closest('.carousel').carousel('pause');
          });
        $('.pauseCarousel').click(function(){
            $(this).hide();
            $(this).closest('.carousel').carousel('pause');
          });
    });
});

$("#newsModal").on("hidden.bs.modal", function(e) {
    $(".modal-content").html('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="enChargement"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chargement...</div></div>');
});

$('.carousel').find('.item').click(function(){
    $(this).closest('.carousel').carousel('pause');
  });
$('.pauseCarousel').click(function(){
    $(this).hide();
    $(this).closest('.carousel').carousel('pause');
  });