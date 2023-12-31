@extends('layouts.default')

@section('additional_styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css" rel="stylesheet" />
@stop

@section('additional_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
@stop

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$page->picture}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="container">
                    @foreach($pictures as $chunk)
                        <div class="row mb-3">
                            @foreach($chunk as $pictureUrl)
                                <a href="{{asset($pictureUrl)}}" data-toggle="lightbox" data-gallery="gallery" class="col-md-4 ">
                                    <img src="{{asset($pictureUrl)}}" class="img-fluid rounded ftco-animate">
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> <!-- .section -->

@stop
