$.noConflict();
jQuery(document).ready(function($) {
    baseUrlT = $("#base_url").val();
    funT = 'translation/translate';

    $(".ch_translate").click(function() {
        $('.ch_translate').removeAttr('checked');
        $(this).attr('checked', 'checked')
    });
    $('.dro_translate').change(function() {
        var langId = $(this).val();// Language Id
        var itemId = $('.ch_translate:checked').val();// Item Id
        var langTitle =$('.dro_translate option:selected').text();
        if (itemId > 0 && langId > 0) {
            sendData($('.translation_rule').html(), langId, itemId, langTitle);
        }
    });

    function sendData(sendData, langId, itemId, langTitle) {
        $.ajax({
            type: "POST",
            async: false,
            url: baseUrlT + funT,
            data: {data: sendData, langId: langId, langTitle: langTitle, itemId: itemId},
            dataType: 'html',
            success: function(data) {
                
                $('#translation_form').html(data);
            }
        });
    }
});