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
                 if(msg != "")
                    alert(msg);
                 location.reload();
            });
        } 
        return false;
    });

    $(".addReview").submit ( function(event){
        event.preventDefault();
        var value = $("input[type=range]", this).val();
        if (value != "0"){
            $.ajax({
                type: "POST",
                url: "database/addReview.php",
                data: { 
                    restaurant_id: $("input[type=hidden]", this).val(),
                    value: $("input[type=range]", this).val(),
                    comment: $("textarea", this).val()
                }
            }).done(function( msg ) {
                 if(msg != "")
                    alert(msg);
                 location.reload();
            });
        } 
        return false;
    });

    $(".addReview input[type=range]").change ( function(){
         $("#value").text($(".addReview input[type=range]").val());
        }
    );
});