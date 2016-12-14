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
        if ($("#photo").val() == "")
            return false;
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
            if (msg.length > 0)
                alert(msg);
            else{
                $("#addPhotoForm #photo").val("");
                alert("Success"); 
            }
        }); 
        return false;
    });

     $(".delete").click ( function(){
        var path = $("#modal .modal_image").attr("src");
        confirm("Are you sure you want to delete this image?");
        $.ajax({
            type: "POST",
            url: "database/deleteImage.php",
            data: {
                res_id: $("input[name=res_id]").val(),
                path: path
                }
        }).done(function( msg ) {
            location.reload();//Talvez fazer algo diferente
        }); 
        return false;
    });

     $("#delete_all").click ( function(){
        confirm("Are you sure you want to delete this restaurant?\nThis action can't be undone!");
        confirm("Are you sure you want to delete this restaurant?\nAll images and comments will be deleted!");
        confirm("Are you REALLY sure?");
        $.ajax({
            type: "POST",
            url: "database/deleteRestaurant.php",
            data: {
                res_id: $("input[name=res_id]").val(),
                }
        }).done(function( msg ) {
            alert("Snorlax is very sad..." + msg);
            window.location.href = "./home.php";
        }); 
        return false;
    });
});