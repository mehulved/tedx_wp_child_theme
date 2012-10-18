jQuery(document).ready(function($) {
    $('.active > a').click(function(e) {
        e.preventDefault();
    });
    var rotation = 10;

    $('.post_content').rotate(rotation);
    $('.post_content').mouseover(function() {
        $(this).rotate(0);
    });
    $('.post_content').mouseout(function() {
        $(this).rotate(rotation);
    });
    $('.speaker-image').click(function() {
        var img_id = $(this).attr('id');
        $('.speaker-content#' + img_id).dialog({width:950});
    });
});
