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
                    @include('event.partials.item')
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" id="sf">
                <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                    <div class="alert alert-info text-center" role="alert">
                        {{__t('Знайшли класне місце для майбутньої застрічі? Поділіться, щоб ми могли зібрати всіх!')}} <br>
                        <button type="button" class="btn btn-primary" id="event-btn">{{__t('Поділитись')}}</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center event-form d-none">
                <div class="col-md-8 block-9 mb-md-5">
                    @include('event.partials.form')
                </div>
            </div>
        </div>
    </section>
@stop
@section('additional_scripts')
    <script src="/js/event.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
@stop
