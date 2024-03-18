let Event = {

    init: function () {
        this.showEvents();
    },

    showEvents:function () {
        $('#event-btn').on('click', function (e) {
            $(".event-form").removeClass('d-none');
        })
    },
}

$(document).ready(function () {
    Event.init();
});
