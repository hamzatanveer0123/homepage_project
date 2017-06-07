$('document').ready(function () {
    // var textareas = $('textarea');
    //
    // for (var i = 0; i < textareas.length; i++) {
    //     resize(textareas[i]);
    // }
    //
    // function resize(text) {
    //     $(text).css('height', 'auto');
    //     $(text).css('height', text.scrollHeight + 'px');
    // }
    //
    // $('textarea').keypress(function () {
    //     resize(this);
    // });
    //
    // $('textarea').keyup(function (e) {
    //     if (e.keyCode == 8) resize(this);
    // });

    // vue js
    // var link = '/';
    // var data = {
    //     message: null
    // };
    //
    // Vue.http.get(link).then(function(response){
    //     data.message = response.data;
    // }, function(error){
    //     console.log(error.statusText);
    // });
    // new Vue ({
    //     el: '.grid',
    //     data: data
    // });


    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: 46,
            gutter: 10,
        }
    });


    // for toggling delete button on bookmark
    $('.invisible-button').hover(function () {
        $(this).next('.delete-button').css("visibility", "visible");
    });

    $('.card').hover(function () {
        $(this);
    }, function () {
        $(this).find('.delete-button').css("visibility", "hidden");
    });

    $('.menu-btn').click(function (event) {
        var button = $(this);
        if (button.data('clicked')) {
            $('.add-new-card').css('bottom', '85px');
            $('.add-new-notes').css('bottom', '140px');
            button.data('clicked', false);
        } else {
            $('.add-new-card').css('bottom', '20px');
            $('.add-new-notes').css('bottom', '20px');
            button.data('clicked', true);
        }
    });

    // for saving changes
    $(".notes").change(function (event) {
        event.preventDefault();
        var note = $(this);
        var text = $(this).val();
        var card_id = $(this).data('id');
        var user_id = $(this).data('uid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: 'edit_notes',
            data: {
                note: text,
                id: card_id,
                uid: user_id,
            },
            success: function (response) {
                console.log(response);
                note.addClass('glow-success');
                setInterval(function () {
                    note.removeClass('glow-success');
                }, 3000);
            },
            error: function (response) {
                console.log(response);
                note.addClass('glow-error');
                setInterval(function () {
                    note.removeClass('glow-error');
                }, 3000);
            }
        });
    });
});