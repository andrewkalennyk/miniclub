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
        </div>
    </section>
@stop

@section('additional_scripts')
    <script src="/js/service.js"></script>
@stop
