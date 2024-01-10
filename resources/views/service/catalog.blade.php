@extends('layouts.default')

@section('main')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$page->picture}}');"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    @include('partials.breadcrumbs')
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light pt-3">
        <div class="container">
            @if($types->count())
                <div class="row mb-2 pl-3 pr-3">
                    <ul class="nav nav-pills nav-fill flex-column flex-sm-row">
                        @if($cities->count())
                            <li class="nav-item">
                                <select name="city_filter" class="custom-select" style="color: rgba(0, 0, 0, 0.4) !important;">
                                    <option selected>{{__t('Місто')}}</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->t('title')}}</option>
                                    @endforeach
                                </select>
                            </li>
                        @endif
                        @foreach($types as $type)
                            <li class="nav-item">
                                <a class="nav-link btn @if($loop->first) btn-secondary @endif"  data-type="{{$type->type}}" href="#">{{$type->t('title')}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                @foreach($services as $service)
                    @include('service.partials.service-item')
                @endforeach
            </div>
            <div class="row justify-content-center" id="sf">
                <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                    <div class="alert alert-info text-center" role="alert">
                        {{__t('Знайшли класні сервіси для свого міні? Поділіться, щоб інші теж могли скористатися!')}} <br>
                        <button type="button" class="btn btn-primary" id="share-service-btn">{{__t('Поділитись')}}</button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center share-service-form d-none">
                <div class="col-md-8 block-9 mb-md-5">
                    <form action="#"
                          data-action="{{route('share-service-form')}}"
                          name="share-service-form"
                          id="share-service-form"
                          class="bg-light p-5 share-service-form">
                        {{csrf_field()}}
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
    <script src="/js/service.js"></script>
@stop

@section('additional_styles')
    <link rel="stylesheet" href="/css/rates.css" />
@stop
