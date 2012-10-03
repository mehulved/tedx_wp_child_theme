jQuery(document).ready(function($) {
    var btn_id;
    $('.upload_button').click(function() {
        btn_id = $(this).attr('id');
        formfield = $('#' + btn_id + '_text').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = $('img', html).attr('src');
        $('#' + btn_id + '_text').val(imgurl);
        tb_remove();
    }
});
