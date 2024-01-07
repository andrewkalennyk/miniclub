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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$page->picture}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Not Normal</span>
                    <h2 class="mb-3">{{__t('Знайшли класні сервіси для свого міні? Поділіться, щоб інші теж могли скористатися!')}} </h2>
                </div>
            </div>

            <div class="row justify-content-center share-service-form">
                <div class="col-md-8 block-9 mb-md-5">

                    <form action="#"
                          data-action="{{route('share-service-form')}}"
                          name="share-service-form"
                          id="share-service-form"
                          class="bg-light p-5 share-service-form service-page">
                        {{csrf_field()}}
                        <div class="alert alert-success d-none" role="alert"></div>
                        <div class="alert alert-warning d-none" role="alert"></div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="{{__t('Назва Сервісу')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="{{__t('Посилання')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="google_map" placeholder="{{__t('Мітка на карті')}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="service_type">
                                <option>{{__t('Тип сервісу')}}</option>
                                @foreach($types as $type)
                                    <option value="{{$type->type}}">{{$type->t('title')}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($allCities->count())
                            <div class="form-group">
                                <select class="form-control" name="city_id">
                                    <option>{{__t('Місто')}}</option>
                                    @foreach($allCities as $city)
                                        <option value="{{$city->id}}">{{$city->t('title')}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="social_name"
                                   placeholder="{{__t('Ваш Telegram Нік')}}"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="{{__t('Важливо! ')}}"
                            >
                        </div>
                        <div class="form-group">
                            <div id="rating"></div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" name="review" placeholder="{{__t('Відгук')}}"></textarea>
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
    </section>

@stop
