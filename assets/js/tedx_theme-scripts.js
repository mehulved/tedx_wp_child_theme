jQuery(document).ready(function($) {
    $('.active > a').click(function(e) {
        e.preventDefault();
    });
    var rotation = 10;

    $('.post_speakers').rotate(rotation);
    $('.post_speakers').mouseover(function() {
        $(this).rotate(0);
    });
    $('.post_speakers').mouseout(function() {
        $(this).rotate(rotation);
    });
    $('.speaker-image').click(function() {
        var img_id = $(this).attr('id');
        $('.speaker-content#' + img_id).dialog({width:600, height:400});
    });
});
