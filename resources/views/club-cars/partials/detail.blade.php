@extends('layouts.default')
@section('main')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$page->backgound_image}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url({{ $page->image }});"></div>
                    <div class="text text-center">
                        <span class="subheading">Mini</span>
                        <h2>{{$page->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><img src="/images/car-icon.png" style="width: 50px; height: 50px;"></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Модель
                                    <span>{{$page->car_model->title}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><img src="/images/calendar-icon.png" style="width: 50px; height: 50px;"></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Рік
                                    <span>{{$page->year}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><img src="/images/car-door.png" style="width: 40px; height: 40px;"></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Двері
                                    <span>{{$page->car_model->door_count}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><img src="/images/cogs-icon.png" style="width: 55px; height: 55px;"></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Трансмісія
                                    <span>{{$page->transmission}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><img src="/images/petrol-pump-icon.png" style="width: 45px; height: 45px;"></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Пальне
                                    <span>{{$page->petrol}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    @include('club-cars.partials.description')
@stop
