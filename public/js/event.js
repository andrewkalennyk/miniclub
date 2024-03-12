'use strict';

let Event = {

    init: function () {
        this.showAddFastEvents();

        $("#datepicker").datepicker({
            format: "yyyy-m-d",
            autoclose: true,
            todayHighlight: true,
            startDate: '0d', // Disables all dates before today
            weekStart: 1 // Week starts from Monday
        });
    },

    showAddFastEvents:function () {
        $('#add-fast-event-btn').on('click', function (e) {
            $(".fast-event-form").removeClass('d-none');
        });
    },

}

$(document).ready(function () {
    Event.init();
});
