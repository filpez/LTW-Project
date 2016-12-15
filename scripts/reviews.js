$ (function() {   
    $(".addComment").submit ( function(event){
        event.preventDefault();
        var comment = $("textarea", this).val();
        if (comment != ""){
            $.ajax({
                type: "POST",
                url: "database/addComment.php",
                data: { 
                    review_id: $("input[type=hidden]", this).val(),
                    comment: comment
                }
            }).done(function( msg ) {
                 location.reload();
            });
        } 
        return false;
    });
});