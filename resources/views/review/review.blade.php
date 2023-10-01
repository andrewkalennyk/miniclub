@extends('layouts.default')

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/review-image.jpeg');"
             data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="row">
                        <div class="pills col-md-6">
                            <div class="about-author d-flex p-4 bg-light  review">
                                <div class="bio mr-5">
                                    <img src="{{$page->getReviewerPicture()}}" width="200" height="200" alt="Image placeholder"
                                         class="img-fluid mb-4 rounded">
                                </div>
                                <div class="desc">
                                    <h3>{{$page->getReviewerName()}}</h3>
                                    <span class="text-right">{{$page->getDate()}}</span>
                                    <p class="star">
                                <span>
                                    @for($i = 0; $i < $page->getMark(); $i++)
                                        <i class="ion-ios-star"></i>
                                    @endfor
                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if($page->getOtherImg('pictures'))
                            <div class="col-md-6">
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        @foreach($page->getOtherImg('pictures') as $picture)
                                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                                <img src="{{$picture}}" width="100%" height="500">
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>

                        @endif
                    </div>

                    {!! $page->comment !!}

                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@stop

