$('document').ready(function () {
    $('.invisible-button').hover(function(){
        $(this).next('.delete-button').css("visibility", "visible");
    });

    $('.card').hover(function(){
        $(this);
    }, function(){
        $(this).find('.delete-button').css("visibility", "hidden");
    });
})
