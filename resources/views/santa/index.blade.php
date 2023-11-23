@extends('layouts.default')

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/secret-santa.webp');"
             data-stellar-background-ratio="0.5">
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center mb-4">Правила Таємного Санти</h1>
                    <p>Ось правила для нашого обміну подарунками Таємного Санти:</p>
                    <ol>
                        <li>Кінцева дата подачі заявок - <b>07 грудня 2023 року</b>. Кожен учасник повинен надіслати свою заявку.</li>
                        <li><b>08 грудня 2023 року</b>,на пошту, кожен учасник отрмає інформацію про щасливчика якому треба підібрати подарунок.</li>
                        <li>Бюджет на подарунок в межах <b>500-1000 гривень</b>. Учасники повинні дотримуватися цього бюджету.</li>
                        <li>Дата розіграшу - <b>17 грудня 2023 року</b>. Організатори зберуть всі подарунки у багажник тачки і кожен по черзі буде знаходити свій подарунок / Організатори в певний час видадуть подарунок учаснику.</li>
                        <li>Під час обміну подарунками, кожен учасник повинен спробувати вгадати, хто обрав його для подарунка, основуючись на загадці та власних здогадках..</li>
                        <li>Після розіграшу, учасники можуть відкрити свою особу та подякувати своєму Таємному Санті, якщо вони того прагнуть.</li>
                        <li>Учасники повинні дотримуватися етичних норм та подарунків, які не порушують закон або правила гри.</li>
                        <li>Якщо учасник не може взяти участь у зустрічі для обміну подарунками, він повинен повідомити організаторів заздалегідь. Учасник, який отримав подарунок поштою, також повинен поділитися своїм враженням та фото або відео моменту розпаковки у групі або іншому зручному форматі.</li>
                    </ol>
                    <p class="mt-4">Якщо у вас є які-небудь питання чи сумніви, не соромтеся звертатися до організатора.</p>
                    <button class="btn btn-primary" id="agreeBtn">{{__t('Погоджуюсь')}}</button>
                </div>
            </div>
        </div>
        <div class="container d-none mt-3" id="form-container">
            <h3>Візьми участь в таємному Санті! Заповни анкету <span class="badge badge-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-gift" viewBox="0 0 16 16">
                     <path
                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07M9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                    </svg>
                </span>
            </h3>
            <div class="card shadow-lg">
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">{{__t("Ім'я")}}</label>
                                <input type="text" class="form-control" id="inputName" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputSocialName">{{__t("Нік в телеграм")}}</label>
                                <input type="text" class="form-control" name="social_name" id="inputSocialName">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCarNumber">{{__t("Номер Машини")}}</label>
                                <input type="text" class="form-control" name="car_number" id="inputCarNumber">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCarDetails">{{__t("Марка Модель рік випуску")}}</label>
                                <input type="text" class="form-control" name="car_number" id="inputCarDetails">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">{{__t('Лінк на інсту')}}</label>
                                <input type="text" class="form-control"  id="inputEmail" name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aboutYou">{{__t('Напишіть щось про себе')}}</label>
                            <textarea class="form-control" id="aboutYou" rows="3"></textarea>
                        </div>
                        <div class="alert alert-danger d-none"  role="alert">
                            {{__t('Не тицяй! Це поки макет!')}}
                        </div>
                        <button type="submit" class="btn btn-primary" id="secretBtnForm" >{{__t('Відправити')}}</button>
                    </form>
                </div>
            </div>
        </div>

    </section> <!-- .section -->
@stop


<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('#secretBtnForm').on('click', function (e) {
            e.preventDefault();
            $('.alert.alert-danger').removeClass('d-none');

            setTimeout(function() {
                $('.alert.alert-danger').addClass('d-none');
            }, 4000);
        })
        $('#agreeBtn').on('click', function (e) {
            e.preventDefault();
            $(this).hide();
            $('#form-container').removeClass('d-none');
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#form-container").offset().top - $(".ftco_navbar").outerHeight()
            }, 1000);
        })
    })
</script>
