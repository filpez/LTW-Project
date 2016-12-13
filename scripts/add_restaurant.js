$ (function() {   
    var button = $("#submit");
    button.click ( function(event){
        $.ajax({
            type: "POST",
            url: "database/createRestaurant.php",
            data: {
                name: $("input[name=name]").val(),
                local: $("input[name=local]").val(),
                photo: $("input[name=photo]").val(),
                opening: $("input[name=opening]").val(),
                closing: $("input[name=closing]").val(),
                description: $("textarea").val(),
                code: $("input[name=code]").val(),
            }
        }).done(function( msg ) {
            if (!isNaN(msg))
                window.location.href = "./restaurant.php?id="+msg;
            else
                alert(msg);
        }); 
        return false;
    });
});