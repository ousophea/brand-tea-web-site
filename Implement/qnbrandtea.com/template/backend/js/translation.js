$.noConflict();
jQuery(document).ready(function($) {
    $(".ch_translate").click(function() {
        $('.ch_translate').removeAttr('checked');
        $(this).attr('checked','checked')
    });
});