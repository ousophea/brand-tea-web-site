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
        var langTitle = $('.dro_translate option:selected').text();
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

    $('table.tablesorter td').each(function(e) {
        id = $(this).attr('id');
        if (id) {
            table = $(this).find('input[name=table-' + id + ']').val();
            field = $(this).find('input[name=field-' + id + ']').val();
            itemId = id.split('-');
            getLang(table, field, itemId[1], id);
            
        }
        
    });

    function getLang(table, foreinkey, id, result) {
        $.ajax({
            type: "POST",
            async: false,
            url: baseUrlT + 'translation/getLang',
            data: {itemId: id, table: table, foreinkey: foreinkey},
            dataType: 'html',
            success: function(data) {
                $('#'+result).html(data);
            }
        });
    }
    return false;
});