$ (function() {   
    var button = $("#save");
    button.click ( function(event){
        $.ajax({
            type: "POST",
            url: "database/editRestaurant.php",
            data: {
                res_id: $("input[name=res_id]").val(),
                name: $("input[name=name]").val(),
                local: $("input[name=local]").val(),
                opening: $("input[name=opening]").val(),
                closing: $("input[name=closing]").val(),
                description: $("textarea").val()
            }
        }).done(function( msg ) {
            alert(msg);
        }); 
        return false;
    });
});