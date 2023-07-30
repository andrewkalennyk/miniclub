'use strict';

let Service = {

    activeTab: '',

    init: function () {
        this.findActiveTab();
        this.showActiveServices();
        this.tabEventChanger();
    },

    findActiveTab: function () {
        Service.activeTab = $('.nav-link.btn.btn-secondary').data('type');
    },

    showActiveServices:function () {
        $(".service").addClass('d-none');
        $(".service[data-type='" + this.activeTab + "']").removeClass('d-none');
    },

    tabEventChanger: function () {
        $('.nav-link.btn').on('click', function (e) {
            e.preventDefault();

            $('.nav-link.btn').removeClass('btn-secondary');
            $(this).addClass('btn-secondary');

            Service.findActiveTab();
            Service.showActiveServices();
        })
    }


}

$(document).ready(function () {
    Service.init();
});
