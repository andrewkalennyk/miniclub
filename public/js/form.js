'use strict';

let Form = {

    init: function () {
        Form.proposeForm();
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
};

$(document).ready(function () {
    Form.init();
});
