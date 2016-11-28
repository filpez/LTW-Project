$ (function() {   
    var search = $("#search_form #search_field");
    var search_btn = $("#search_form #search_button");
    search_btn.click ( function(event){
        if (!search.val())
            event.preventDefault();
        else{
            var data = {search_field: search.val()}
            if($("#minimum_rating").val() > 0)
                data['minimum_rating'] = $("#minimum_rating").val();
            if($("input[name=local]" ).val())
                data['local'] = $("input[name=local]").val();
             if($("input[name=owner]" ).val())
                data['owner'] = $("input[name=owner]").val();
            $.ajax({
                type: "GET",
                url: "database/search_restaurant.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#search_results").html('<ul id="results"></ul>'); 
                },
                success: function(html){ // this happens after we get results
                    $("#results").before("<h3 id=\"search_results_header\">Search results :</h3>")
                    $("#results").append(html);
                    $("#search_results").css("display", "block");
                }
           }); 
        }
        return false;
    });
});