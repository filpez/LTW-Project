$ (function() {   
    var index = 0;
    var images = document.getElementsByClassName("photo");
    var modal = $("#modal");
    var modal_image = $("#modal .modal_image");
    /*//for (var i = 0; i < images.length; i++){
        //$(images[i]).click ( function(){
        $(images).click ( function(){
            modal_image.attr("src", this.src);
            index = $(images).index();
            modal.css("display", "block");
        });
    //};*/

    for (var i = 0; i < images.length; i++){
        images[i].index = i;
        $(images[i]).click ( function(){
            modal_image.attr("src", this.src);
            index = this.index;
            modal.css("display", "block");
            updateArrows();
        });
    };
   
    $(".close").click ( function(){
        modal.css("display", "none");
    });

    $(".left_arrow").click ( function(){
        index--;
        var new_image = images[index];
        modal_image.attr("src", new_image.src);
        updateArrows();
    });

     $(".right_arrow").click ( function(){
        index++;
        var new_image = images[index];
        modal_image.attr("src", new_image.src);
        updateArrows();
    });

    updateArrows = function(){
        if (index == 0)
            $(".left_arrow").css("display", "none");
        else
            $(".left_arrow").css("display", "block");

        if (index == images.length-1)
            $(".right_arrow").css("display", "none");
        else
            $(".right_arrow").css("display", "block");
    }
});