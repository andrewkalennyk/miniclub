'use strict';

let Santa = {
    init: function () {

        $('#agreeBtn').on('click', function (e) {
            e.preventDefault();
            $(this).hide();
            $('#form-container').removeClass('d-none');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#form-container").offset().top - $(".ftco_navbar").outerHeight()
            }, 1000);
        })

        Santa.sendForm();
        Santa.sendDetailsForm();
    },

    sendForm: function () {
        $('form[name="secret-apply-form"]').validate({
            rules : {
                name : { required : true },
                social_name : { required : true },
                car_details : { required : true },
                email : { required : true , email: true},
                np_address : { required : true },
                about_description : { required : true },
            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                $('#secretBtnForm').prop('disabled', true);
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        $('#secretBtnForm').prop('disabled', false);
                        if (response.status) {
                            document.getElementById("secret-apply-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                            }, 4000);
                        } else {
                            $(form).find('.alert-danger').text(response.error_message);
                            $(form).find('.alert-danger').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-danger').addClass('d-none');
                            }, 6000);
                        }
                    },
                    error: function (error) {
                        var errors = error.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function (key, value) {
                            errorMessage += value + '<br>';
                        });

                    }
                });
            }
        });
    },

    sendDetailsForm: function () {
        $('form[name="secret-details-apply-form"]').validate({
            rules : {
                social_name : { required : true },
                about_description_details : { required : true },
            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                $('#secretBtnForm').prop('disabled', true);
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        $('#secretBtnForm').prop('disabled', false);
                        if (response.status) {
                            document.getElementById("secret-details-apply-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                            }, 4000);
                        } else {
                            $(form).find('.alert-danger').text(response.error_message);
                            $(form).find('.alert-danger').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-danger').addClass('d-none');
                            }, 6000);
                        }
                    },
                    error: function (error) {
                        var errors = error.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function (key, value) {
                            errorMessage += value + '<br>';
                        });

                    }
                });
            }
        });
    },

}

$(document).ready(function () {
    Santa.init();
});
