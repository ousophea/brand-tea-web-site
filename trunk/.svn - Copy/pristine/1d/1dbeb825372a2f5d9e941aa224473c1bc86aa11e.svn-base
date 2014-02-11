jQuery(document).ready(function($) {
    var groId = 0;
    var fields='';
    $("#gro").change(function() {
        groId = $(this).val();
        getCatFields();
    });

    function getCatFields() {
        $.post("product/getFields", {gro_id: groId})
                .done(function(data) {
            fields = data;
            addToHtmlElement();
            
            
        });
    }
    
    function addToHtmlElement(){
        // Clear element firlst
        $("#fields").html('');
        // Append data to this id
        $("#fields").append(fields);
    }
});