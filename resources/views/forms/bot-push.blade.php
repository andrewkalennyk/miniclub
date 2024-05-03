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
                    <h1 class="text-center">{{__t('Відправ повідомлення в чат! ')}}</h1>
                    <p class="text-center">
                        {{__t('Слава Україні! ')}}
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center donate-form">
            <div class="col-md-8 block-9 mb-md-5">

                <form action="#"
                      data-action="{{route('send-bot-form')}}"
                      name="send-bot-form"
                      id="send-bot-form"
                      class="bg-light p-5 send-bot-form service-page">
                    {{csrf_field()}}
                    <div class="alert alert-success d-none" role="alert"></div>
                    <div class="alert alert-warning d-none" role="alert"></div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" name="message" placeholder="{{__t('Повідомлення')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{__t('Відправити')}}" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>

    </section> <!-- .section -->
@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
