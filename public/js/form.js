'use strict';

let Form = {

    userNameData: [],

    init: function () {
        Form.proposeForm();
        Form.ratingForm();
        Form.shareServiceForm();
        Form.askForm();
        Form.fastEventForm();
        Form.checkInForm();
    },

    proposeForm: function () {
        $('form[name="propose"]').validate({
            rules : {
                proposition : { required : true }
            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            document.getElementById("propose-form").reset();
                            $('.modalResponse .modal-title').text('Сердечно дякуємо за ваше відверте звернення!');
                            $('.modalResponse .body').text('Нам вдалося припаркувати ваші слова просто під нашим вікном. І ви вірите чи ні, але вони вже почали\n' +
                                '                підпригувати радісно, бо такого відповідального завдання ще не отримували!');
                            $('#modalResponse').modal();


                            setTimeout(function() {
                                $('#modalResponse').modal('hide');
                            }, 4000);
                        } else {
                            $('.modalResponse .modal-title').text('Сердечно дякуємо за ваше відверте звернення!')
                            $('.modalResponse .body').text('');

                            setTimeout(function() {
                                $('#modalResponse').modal('hide');
                            }, 2000);
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

    ratingForm: function () {
        $('form[name="rating-form"]').validate({
            rules : {
                social_name : { required : true },
                name : { required : true },
                message : { required : true },
            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            document.getElementById("rating-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                            }, 4000);
                        } else {
                            $(form).find('.alert-warning').text(response.error_message);
                            $('.modalResponse .body').text('');

                            setTimeout(function() {
                                $(form).find('.alert-warning').addClass('d-none');
                            }, 2000);
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

    shareServiceForm: function () {
        $('form[name="share-service-form"]').validate({
            rules : {
                social_name : { required : true },
                title : { required : true },
                type : { required : true },
                city : { required : true },
                message : { required : true },
            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            document.getElementById("share-service-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                                if (!$('.share-service-form').hasClass('service-page')) {
                                    $('.share-service-form').addClass('d-none');
                                }
                            }, 4000);
                        } else {
                            $(form).find('.alert-warning').text(response.error_message);
                            $('.modalResponse .body').text('');

                            setTimeout(function() {
                                $(form).find('.alert-warning').addClass('d-none');
                            }, 2000);
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

    askForm: function () {
        $('#anonymously').change(function(){
            // Check if the checkbox is checked
            if(this.checked) {
                // Get the value of the checkbox
                $('.inputSocialNameRow').hide();
            } else {
                $('.inputSocialNameRow').show();
            }
        });

        $('form[name="ask-us-anything-form"]').validate({
            rules : {
                proposition : { required : true },

            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        $('#secretBtnForm').prop('disabled', false);
                        if (response.status) {
                            document.getElementById("ask-us-anything-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                            }, 8000);
                        } else {
                            $(form).find('.alert-danger').text(response.error_message);
                            $(form).find('.alert-danger').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-danger').addClass('d-none');
                            }, 8000);
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

    fastEventForm: function () {
        $('form[name="fast-event-form"]').validate({
            rules : {
                title : { required : true },
                responsible : { required : true },

            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        $('#fast-event-btn').prop('disabled', false);
                        if (response.status) {
                            document.getElementById("fast-event-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            setTimeout(function() {
                                window.location.href = response.url;
                            }, 4000);
                        } else {
                            $(form).find('.alert-danger').text(response.error_message);
                            $(form).find('.alert-danger').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-danger').addClass('d-none');
                            }, 8000);
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

    checkInForm: function () {
        $('form[name="check-in-form"]').validate({
            rules : {
                user : { required : true },

            },
            errorPlacement : function(error, element) {},
            submitHandler: function(form) {
                jQuery.ajax({
                    data: $(form).serializeArray(),
                    type: "POST",
                    url: $(form).data('action'),
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        $('#fast-event-btn').prop('disabled', false);
                        if (response.status) {
                            document.getElementById("check-in-form").reset();
                            $(form).find('.alert-success').text(response.success_message);
                            $(form).find('.alert-success').removeClass('d-none');

                            let usersList = '';
                            $.each(response.users, function (key, value) {
                                usersList += '<a href="' + value.url + '" class="tag-cloud-link" style="font-size: 15px;">' + value.user + '</a>';
                            });

                            $('.tagcloud').html(usersList);

                            setTimeout(function() {
                                $(form).find('.alert-success').addClass('d-none');
                            }, 4000);
                        } else {
                            $(form).find('.alert-warning').text(response.error_message);
                            $(form).find('.alert-warning').removeClass('d-none');

                            setTimeout(function() {
                                $(form).find('.alert-warning').addClass('d-none');
                            }, 4000);
                        }
                    },
                    error: function (error) {
                        var errors = error.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function (key, value) {
                            errorMessage += value;
                        });

                        $(form).find('.alert-danger').text(errorMessage);
                        $(form).find('.alert-danger').removeClass('d-none');

                        setTimeout(function() {
                            $(form).find('.alert-danger').addClass('d-none');
                        }, 4000);

                    }
                });
            }
        });
    }
};

$(document).ready(function () {
    Form.init();
});
