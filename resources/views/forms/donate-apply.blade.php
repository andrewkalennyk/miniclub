@extends('layouts.default')

@section('seo_tags')
    <meta property="og:title" content="Ask us anything" />
@stop

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/donate.webp');"
             data-stellar-background-ratio="0.5">
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{__t('Запропонуй збір')}}</h1>
                    <p class="lead">
                        {{__t('Привіт, дорогі друзі!')}}
                    </p>
                    <p class="text-center">
                        <strong>{{__t('У вас є можливість запостити збір! Скористайтесь цим шансом! ')}}</strong>
                    </p>
                    <p class="text-right">
                        {{__t('Слава Україні! ')}}
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center donate-form">
            <div class="col-md-8 block-9 mb-md-5">

                <form action="#"
                      data-action="{{route('donate-form')}}"
                      name="donate-form"
                      id="donate-form"
                      class="bg-light p-5 donate-form service-page">
                    {{csrf_field()}}
                    <div class="alert alert-success d-none" role="alert"></div>
                    <div class="alert alert-warning d-none" role="alert"></div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="{{__t('Назва')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="whom" placeholder="{{__t('Кому')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="what" placeholder="{{__t('На що')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="for_what" placeholder="{{__t('Щоб що')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="{{__t('Посилання')}}">
                    </div>
                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               name="author"
                               placeholder="{{__t('Ваш Telegram Нік')}}"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="{{__t('Важливо!')}}"
                        >
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" name="short_description" placeholder="{{__t('Коротенький опис')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{__t('Відправити')}}" class="btn btn-primary py-3 px-5">
                    </div>
                    <div class="alert alert-success d-none" role="alert"></div>
                    <div class="alert alert-warning d-none" role="alert"></div>
                </form>

            </div>
        </div>

    </section> <!-- .section -->
@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
