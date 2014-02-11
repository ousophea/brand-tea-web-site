$.noConflict();
jQuery(document).ready(function($) {
    $(".category-add").click(function() {
        $("#category-add").append("<div><br /><label>Name <input type='text' name='label[]' /></label><label>Value <input type='text' name='field[]' /></label><input type='button' value='Delete' class='delete button' /></div>");
        $(".delete").on('click', function(e) {
            e.preventDefault();
            $(this).parent().remove();
        });
    });
    $(".delete").on('click', function(e) {
        e.preventDefault();
        $(this).parent().remove();
    });
});