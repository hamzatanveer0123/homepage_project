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
import store from './vuex/store';
var app = new Vue({
    el: 
});
//# sourceMappingURL=all.js.map
