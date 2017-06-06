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

/**
 * Created by hamzamalik0123 on 02/06/2017.
 */
import Vue from "vue";
var app = new Vue({
    el: "body",
    data: {
        message: "hello"
    }
});
//# sourceMappingURL=all.js.map
