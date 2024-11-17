@extends('layouts.default')

@section('additional_scripts')
    <script src="/js/jquery-rates.js"></script>

    <script>
        $('document').ready(function () {
            $('#rating').rates({
                shadeColor:'rates-green',
            });
        })
    </script>

    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop

@section('additional_styles')
    <link rel="stylesheet" href="/css/rates.css" />
@stop

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$treePage->picture}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <img src="{{$page->logo}}" class="mx-auto d-block img-fluid"  width="300" alt="{{$page->t('title')}}">
                        <div class="text text-center">
                            <span class="subheading">{{$page->service_type->t('title')}}</span>
                            <h2>{{$page->t('title')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('service.partials.service-contact-info')
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">
                                        {{__t('Відгуки')}} <span class="icon-chat"></span> {{$page->reviews->count()}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pill-review-tab" data-toggle="pill" href="#pill-review" role="tab" aria-controls="pill-review" aria-expanded="true">
                                        {{__t('Залиш Відгук')}} <span class="icon-order"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        @include('service.partials.reviews')
                                    </div>
                                    <div class="col-md-5">
                                        @include('service.partials.review_statistics')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pill-review" role="tabpanel" aria-labelledby="pill-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <form data-action="{{route('review-form')}}"
                                              method="POST"
                                              name="rating-form"
                                              id="rating-form"
                                              class="bg-light p-5 contact-form"
                                        >
                                            {{csrf_field()}}
                                            <input type="hidden" name="service_id" value="{{$page->id}}">
                                            <div class="form-group">
                                                <div id="rating"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                       name="social_name" class="form-control" placeholder="{{__t('Ваш Telegram Нік')}}"
                                                       data-toggle="tooltip"
                                                       data-placement="top"
                                                       title="{{__t('Важливо! Необхідно впевнитись, що ви є частиною спільноти')}}"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder='{{__t("Ім'я")}}'>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="{{__t("Опишіть будь ласка свій досвід відвідування.")}}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="{{__t('Відправити')}}" class="btn btn-primary py-3 px-5">
                                            </div>
                                            <div class="alert alert-success d-none" role="alert"></div>
                                            <div class="alert alert-warning d-none" role="alert"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($otherServices->count())
        <section class="ftco-section ftco-no-pt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <span class="subheading">{{$page->service_type->t('title')}}</span>
                        <h2 class="mb-2">{{__t('Інші сервіси')}}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($otherServices as $service)
                        @include('service.partials.service-item', ['open'=> true])
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@stop
