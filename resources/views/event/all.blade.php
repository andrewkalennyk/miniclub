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
        </div>
    </section>




@stop
