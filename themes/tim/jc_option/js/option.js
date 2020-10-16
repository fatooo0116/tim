jQuery(document).ready( function( $ ) {
    var target= null;
    $(".upload_image_button").click(function() {
        formfield = $("#upload_image").attr("name");
        tb_show("", "media-upload.php?type=image&amp;TB_iframe=true" );

        target = $(this).attr("target");

        return false;
    });
    window.send_to_editor = function(html) {
        imgurl = $("img",html).attr("src");


        $(target).val(imgurl);
        tb_remove();
    }
});