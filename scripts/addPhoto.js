$ (function() {   
    var button = $("#addPhotoBtn");
    button.click ( function(event){
        $.ajax({
            type: "POST",
            url: "some.php",
            data: { name: "John" }
        }).done(function( msg ) {
            alert( "Added " + msg );
        }); 
    });
});