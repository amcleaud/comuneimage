function afficheLabel(numero) {
        $('#produit'+numero).css('display', 'inline-block');
        $('#produit'+numero).show();
}

function masqueLabel() {
    $('.labelProduit').hide();
}

var sourceSwapIn = function () {
    var $this = $(this);
    $this.parent().css('opacity', '0.7');
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
    $this.parent().fadeTo(500, 1);
    $this.parent().children('.msgEquipier').last().show();
}

var sourceSwapOut = function () {
    var $this = $(this);
    $this.parent().children('.msgEquipier').last().hide();
    $this.parent().css('opacity', '0.7');
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
    $this.parent().fadeTo(300, 1);
}

$(function() {
    $('img[data-alt-src]').each(function() {
        new Image().src = $(this).data('alt-src');
    }).hover(sourceSwapIn, sourceSwapOut);
});