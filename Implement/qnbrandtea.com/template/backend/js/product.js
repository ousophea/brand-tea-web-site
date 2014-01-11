jQuery(document).ready(function($) {
    // On remove
    baseUrl = $("#base_url").val();
    fun = 'product/getFields';
    $("#gro").change(function() {
        groId = $(this).val();
        // Current group. For edit form
        curGroId = $("#gro_id").val();
        if (groId == curGroId) {
            proId = $('#pro_id').val();
            fun = 'product/getProFields';
            getProFields(proId);
        } else {
            getCatFields(groId);
        }

    });
    function getProFields(proId) {
        $.ajax({
            type: "POST",
            async: false,
            url: baseUrl + fun,
            data: {pro_id: proId},
            dataType: 'text',
            success: function(data) {
                addToHtmlElement(data);
            }
        });

    }
    function getCatFields(groId) {
        $.ajax({
            type: "POST",
            async: false,
            url: baseUrl + fun,
            data: {gro_id: groId},
            dataType: 'text',
            success: function(data) {
                addToHtmlElement(data);
            }
        });

    }
    function addToHtmlElement(data) {
        // Clear element firlst
        $("#fields").html('');
        // Append data to this id
        $("#fields").append(data);
        fun = 'product/getFields';

        // For add new product
        $('.hideShow').click(function() {
            $(this).next('input[type=hidden]').val() == 'show' ? $(this).next('input[type=hidden]').val('hide') : $(this).next('input[type=hidden]').val('show');
        });
    }

    $('.remove').click(function() {
        if (confirm("Are you sure you want to remove it?\n Data can not return back!")) {
            phoId = $(this).parent().attr('id');
            phoUrl = $(this).parent().attr('class');
            $(this).parent().remove();
            baseUrl = $("#base_url").val();
            $.ajax({
                type: "POST",
                async: false,
                url: baseUrl + "product/removePhoto",
                data: {pho_id: phoId, pho_url: phoUrl},
                dataType: 'text',
                success: function(data) {
//                alert(data);
                }
            });
        }
    });

    // For update product
    $('.hideShow, .existingHideShow').click(function() {
        $(this).next('input[type=hidden]').val() == 'show' ? $(this).next('input[type=hidden]').val('hide') : $(this).next('input[type=hidden]').val('show');
    });
    
    
   
    

});