$ (function() {   
    var button = $("#submit");
    button.click ( function(event){
        event.preventDefault();
        var formData = new FormData($("#addRestaurantForm")[0]);
        $.ajax({
            type: "POST",
            url: "database/createRestaurant.php",
            cache: false,
            contentType: false,
            processData: false,
            data: formData
        }).done(function( msg ) {
            if (!isNaN(msg))
                window.location.href = "./restaurant.php?id="+msg;
            else
                alert(msg);
        }); 
        return false;
    });
});