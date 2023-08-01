@extends('layouts.default')

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$treePage->picture}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <img src="{{$page->logo}}" class="mx-auto d-block img-fluid" alt="Responsive image">
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
                                    <a class="nav-link active" id="feature-tab" data-toggle="pill" href="#pills-feature" role="tab" aria-controls="pills-feature" aria-expanded="true">{{__t('Особливості')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">{{__t('Відгуки')}}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-feature" role="tabpanel" aria-labelledby="pills-description-tab">
                                @include('service.partials.features', ['features' => $page->service_features->chunk(5)])

                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        @include('service.partials.reviews')
                                    </div>
                                    <div class="col-md-5">
                                        @include('service.partials.review_statistics')
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
