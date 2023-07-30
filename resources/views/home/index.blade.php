@extends('layouts.main')

@section('main')


    <div class="hero-wrap ftco-degree-bg" style="background-image: url('/images/bg_mini.jpg');"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">MINI CLUB UKRAINE 🇺🇦</h1>
                        <p style="font-size: 18px;">{{__t('Вас вітає автомобільний Клуб MINI Україна')}}</p>
                        <a href=""
                           class="icon-wrap d-flex align-items-center mt-4 justify-content-center scroll-to"
                            data-scroll="event-link-block"
                        >
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-arrow-round-down"></span>
                            </div>
                            <div class="heading-title ml-5">
                                <span style="font-size: 18px">{{__t('Швидкий шлях нас знайти')}}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.partials.events.event-form-links')

    @includeWhen($clubs->count(), 'home.partials.clubs')

    @include('home.partials.events.events')

    @include('home.partials.shops')

    @include('home.partials.stickers')

    {{--<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Not normal</span>
                    <h2>Наші тачки</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_1.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_2.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_3.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    @include('home.partials.counter')

@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
