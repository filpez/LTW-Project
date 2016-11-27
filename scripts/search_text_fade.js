$ (function() {   
    var search = $("#menu #search_field");
    search.focus ( function(){
        if (search.val()=="Search for restaurant...")
            search.val("");
    });
    search.blur ( function(){
        if (search.val()=="")
            search.val("Search for restaurant...");
    });
});