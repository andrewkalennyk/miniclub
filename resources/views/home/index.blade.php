@extends('layouts.main')

@section('main')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('/images/bg_mini.webp');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 col-sm-12 col-md-10 ftco-animate">
                    <div class="text w-100 text-center md-5 md-5">
                        <h1 class="mb-4">MINI CLUB UKRAINE 🇺🇦</h1>
                        <p style="font-size: 18px;">{{__t('Вас вітає автомобільний Клуб MINI Україна')}}</p>
                        <a href=""
                           class="icon-wrap d-flex align-items-center mt-4 justify-content-center scroll-to"
                            data-scroll="event-link-block"
                        >
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-arrow-round-down"></span>
                            </div>
                            {{--<div class="heading-title ml-5">
                                <span style="font-size: 18px">{{__t('Швидкий шлях нас знайти')}}</span>
                            </div>--}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.partials.events.event-form-links')

    @includeWhen($clubs->count(), 'home.partials.clubs')

    @include('home.partials.events.events')

   {{-- @includeWhen($services->count(), 'home.partials.services')

    @include('home.partials.faq')--}}

    @include('home.partials.counter')

@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
