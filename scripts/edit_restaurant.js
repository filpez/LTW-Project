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

    var addPhotoBtn = $("#addPhotoBtn");
    addPhotoBtn.click ( function(event){
        event.preventDefault();
        var formData = new FormData($("#addPhotoForm")[0]);
        $.ajax({
            type: "POST",
            url: "database/addImage.php",
            cache: false,
            contentType: false,
            processData: false,
            data: formData
 
        }).done(function( msg ) {
            alert(msg);
        }); 
        return false;
    });
});