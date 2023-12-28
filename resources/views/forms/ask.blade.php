@extends('layouts.default')

@section('seo_tags')
    <meta property="og:title" content="Ask us anything" />
@stop

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/ask-mini.webp');"
             data-stellar-background-ratio="0.5">
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{__t('Звернення до Усіх Членів Клубу Miniclub Ua!')}}</h1>
                    <p class="lead">
                        {{__t('Привіт, дорогі друзі!')}}
                    </p>
                    <p>
                        {{__t('Ми завжди прагнемо зробити наш клуб кращим місцем для всіх нас, любителів Міні Куперів. Ваша думка є надзвичайно важливою для нас, адже саме завдяки вам наш клуб процвітає та розвивається.')}}
                    </p>
                    <p>
                        {{__t('Ми закликаємо вас висловити свої побажання, ідеї, а також поділитися зауваженнями щодо діяльності клубу. Чи є щось, що ми можемо зробити краще? Можливо, є нові заходи чи події, які ви хотіли б бачити в нашому клубі? Ваші відгуки допоможуть нам вдосконалити нашу роботу та зробити клуб більш затишним та дружнім для кожного з вас.')}}
                    </p>
                    <p>
                        {{__t('Будь ласка, не соромтеся висловлювати свої думки. Ми цінуємо кожен відгук і гарантуємо, що кожен голос буде почутий. Також важливо зазначити, що ви маєте можливість надсилати свої відгуки анонімно, якщо це вам зручніше.')}}
                    </p>
                    <p class="text-center">
                        <strong>{{__t('З нетерпінням чекаємо на ваші повідомлення!')}}</strong>
                    </p>
                    <p class="text-right">
                        {{__t('З найкращими побажаннями,')}}
                        <br>
                        {{__t('Адміністрація Клубу')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="container mt-4" id="form-container">
            <h3>{{__t('Будемо раді отримати від тебе фідбек!') }}</h3>
            <div class="card shadow-lg">
                <div class="card-body">
                    <form name="ask-us-anything-form" action data-action="{{route('ask-us-anything-form')}}" id="ask-us-anything-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="proposition">{{__t('Пропозиція/Побажання/ Питання?')}}</label>
                            <textarea class="form-control" id="proposition" name="proposition" rows="5"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_anonymously" id="anonymously">
                                    <label class="form-check-label" for="anonymously">
                                        {{__t('Анонімно')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row inputSocialNameRow">
                            <div class="form-group">
                                <label for="inputSocialName">{{__t("Нік в телеграм")}}</label>
                                <input type="text" class="form-control" name="social_name" id="inputSocialName">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="secretBtnForm" >{{__t('Відправити')}}</button>
                        <div class="alert alert-danger d-none"  role="alert"></div>
                        <div class="alert alert-success d-none"  role="alert"></div>
                    </form>
                </div>
            </div>
        </div>

    </section> <!-- .section -->
@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
