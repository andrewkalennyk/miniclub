@extends('layouts.default')

@section('seo_tags')
    <meta property="og:title" content="Miniclub Secret Santa" />
@stop

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/secret-santa.webp');"
             data-stellar-background-ratio="0.5">
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container" id="form-container">
            <h3>{{__t('Уточни щось про себе та свої вподобання! Допоможи своєму санті') }} <span class="badge badge-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-gift" viewBox="0 0 16 16">
                     <path
                         d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07M9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                    </svg>
                </span>
            </h3>
            <div class="card shadow-lg">
                <div class="card-body">
                    <form name="secret-details-apply-form" action data-action="{{route('secret-santa-details-form')}}" id="secret-details-apply-form">
                        {{csrf_field()}}
                        <div class="alert alert-danger d-none"  role="alert"></div>
                        <div class="alert alert-success d-none"  role="alert"></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputSocialName">{{__t("Виберіть нік*")}}</label>
                                <select class="form-control" name="social_name" id="inputSocialName">
                                    <option value="">{{__t('Виберіть')}}</option>
                                    @foreach($santas as $santa)
                                        <option value="{{$santa->social_name}}">{{$santa->social_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aboutYou">{{__t('Напишіть щось про себе*')}}</label>
                            <textarea class="form-control" id="aboutYou" name="about_description_details" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" id="secretBtnForm" >{{__t('Відправити')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center mb-4">{{__t('Правила Таємного Санти')}}</h1>
                    <ol>
                        <li>{!! __t("Бюджет на подарунок в межах <b>500-1000 гривень</b>. Учасники повинні дотримуватися цього бюджету.") !!}</li>
                        <li>{!! __t("Дата розіграшу - <b>14 січня 2024 року</b>. Організатори зберуть всі подарунки у багажник тачки і кожен по черзі буде знаходити свій подарунок / Організатори в певний час видадуть подарунок учаснику.") !!}</li>
                        <li>{{__t('Під час обміну подарунками, кожен учасник повинен спробувати вгадати, хто обрав його для подарунка, основуючись на загадці та власних здогадках.')}}</li>
                        <li>{{__t('Після розіграшу, учасники можуть відкрити свою особу та подякувати своєму Таємному Санті, якщо вони того прагнуть.')}}</li>
                        <li>{{__t('Учасники повинні дотримуватися етичних норм та подарунків, які не порушують закон або правила гри.')}}</li>
                        <li>{{__t('Якщо учасник не може взяти участь у зустрічі для обміну подарунками, він повинен повідомити організаторів заздалегідь. Учасник, який отримав подарунок поштою, також повинен поділитися своїм враженням та фото або відео моменту розпаковки у групі або іншому зручному форматі.')}}</li>
                    </ol>
                    <p class="mt-4">{{__t('Якщо у вас є які-небудь питання чи сумніви, не соромтеся звертатися до організатора.')}}</p>
                </div>
            </div>
        </div>

    </section> <!-- .section -->
@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/secret-santa.js"></script>
@stop
