<?php /* @var $page \App\Models\ClubCar */?>

@extends('layouts.default')

@section('main')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
             style="background-image: url('{{$page->background_image}}');"
             data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url({{ $page->image }});  background-position: center !important;"></div>
                        <div class="text text-center">
                            <span class="subheading">Mini</span>
                            <h2>{{$page->t('title')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/car-icon.png" style="width: 50px; height: 50px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Модель')}}
                                        <span>{{$page->getModelTitle()}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><img src="/images/calendar-icon.png" style="width: 50px; height: 50px;"></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Рік')}}
                                        <span>{{$page->year}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/car-door.png" style="width: 40px; height: 40px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Двері')}}
                                        <span>{{$page->getDoorCount()}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/cogs-icon.png" style="width: 55px; height: 55px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Трансмісія')}}
                                        <span>{{$page->t('transmission')}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/petrol-pump-icon.png" style="width: 45px; height: 45px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Пальне')}}
                                        <span>{{$page->t('petrol')}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 mb-5">
                <h2 class="mb-3">{{__t('Опис')}}</h2>
                <p class="description">{!!$page->t('description')!!}</p>
            </div>
        </div>

        @include('club-cars.partials.slider')

        <div class="row d-flex justify-content-center mt-2">
            <div class="col-lg-8 mb-5">
                <div class="about-author d-flex align-items-center p-4 bg-light review">
                    <div class="bio mr-5">
                        <img src="{{$page->image}}" width="200" height="200" alt="Image placeholder"
                             class="img-fluid mb-4 rounded">
                    </div>
                    <div class="desc">
                        <h3>{{ $page->getUserSocialName() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('additional_scripts')
    <script>
        $(document).ready(function () {
            const paragraphs = document.querySelectorAll('p > img.fr-dib');
            paragraphs.forEach(function (paragraph) {
                const nextSibling = paragraph.nextSibling;

                if (nextSibling && nextSibling.nodeType === Node.TEXT_NODE) {
                    const span = document.createElement('span');
                    span.innerHTML = nextSibling.nodeValue.trim();
                    span.style.marginLeft = '20px';

                    paragraph.parentNode.removeChild(nextSibling);

                    paragraph.parentNode.insertBefore(span, paragraph.nextSibling);
                }
                paragraph.style.float = 'left';
                paragraph.style.marginRight = '20px';
                paragraph.style.width = 'auto';
                paragraph.style.height = 'auto';
                paragraph.style.maxWidth = '50%';
            });

            setInterval(function () {
                $('#additionalImagesCarousel').carousel('next');
            }, 3000);
        });
    </script>
@stop
