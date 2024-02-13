'use strict';

let Service = {

    activeTab: '',
    activeCityId: '',
    params: new URLSearchParams(),

    init: function () {
        this.findActiveTab();
        this.showActiveServices();
        this.tabEventChanger();
        this.tabCityChanger();
        this.showServiceForm();
    },

    findActiveTab: function () {
        Service.activeTab = $('.nav-link.btn.btn-secondary').data('type');
        Service.activeCityId = $('select[name="city_filter"]').val();
    },

    showActiveServices:function () {
        $(".service").addClass('d-none');
        if (this.activeCityId) {
            $(".service[data-type='" + this.activeTab + "'][data-city='" + this.activeCityId + "']").removeClass('d-none');
        } else {
            $(".service[data-type='" + this.activeTab + "']").removeClass('d-none');
        }
    },

    showServiceForm:function () {
        $('#share-service-btn').on('click', function (e) {
            $(".share-service-form").removeClass('d-none');
        });
    },

    tabEventChanger: function () {
        $('.nav-link.btn').on('click', function (e) {
            e.preventDefault();

            $('.nav-link.btn').removeClass('btn-secondary');
            $(this).addClass('btn-secondary');

            Service.findActiveTab();
            Service.showActiveServices();
            Service.updateURL();
        })
    },
    tabCityChanger: function () {
        $('select[name="city_filter"]').on('change', function (e) {
            Service.activeCityId = parseInt($(this).val());
            Service.showActiveServices();
            Service.updateURL();
        })
    },

    updateURL: function () {
        this.params.set('type', encodeURIComponent(Service.activeTab));
        if (Service.activeCityId) {
            this.params.set('cityId', encodeURIComponent(Service.activeCityId));
        }
        history.pushState(null, '', '?' + this.params.toString());
    },

}

$(document).ready(function () {
    Service.init();
});
