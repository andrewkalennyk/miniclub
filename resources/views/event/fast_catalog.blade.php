@extends('layouts.default')

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$page->picture}}');" data-stellar-background-ratio="0.5">
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
            <div class="row">
                @foreach($events as $event)
                    @include('event.partials.fast_item')
                @endforeach
            </div>

            <div class="row justify-content-center" id="sf">
                <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                    <div class="alert alert-info text-center" role="alert">
                        @if(!$events->count())
                        {{__t('Поки що Івентів нема! Якщо треба створи!')}} <br>
                        @endif
                        <button type="button" class="btn btn-primary" id="add-fast-event-btn">{{__t('Стоворити')}}</button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center fast-event-form d-none">
                <div class="col-md-8 block-9 mb-md-5">
                    <form action="#"
                          data-action="{{route('fast-event-form')}}"
                          name="fast-event-form"
                          id="fast-event-form"
                          class="bg-light p-5 fast-event-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="{{__t('Назва')}}">
                        </div>
                        <div class="form-group">
                            <label for="datepicker">{{__t('Дата')}}</label>
                            <input type="text" class="form-control datepicker" id="datepicker" name="date">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="time" placeholder="{{__t('Час')}}">
                        </div>
                        {{--<div class="form-group">
                            <input type="text" class="form-control" name="google_map" placeholder="{{__t('Мітка на карті')}}">
                        </div>--}}
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="responsible"
                                   placeholder="{{__t('Нік відповідального')}}"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="{{__t('Важливо! ')}}"
                            >
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{__t('Створити')}}" id="fast-event-btn" class="btn btn-primary py-3 px-5">
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
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
    <script src="/js/event.js"></script>
@stop

@section('additional_styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
@stop
