<section class="ftco-section ftco-no-pt bg-light events-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading font-weight-bold">not normal</span>
                <h2 class="mb-2">{{__t('Наші зустрічі')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    @foreach($events as $event)
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <a href="{{$event->getUrl()}}">
                                    <div class="img rounded d-flex align-items-end"
                                         style="background-image: url({{$event->picture}});">
                                    </div>
                                </a>
                                <div class="text">
                                    <h2 class="mb-0"><a href="{{$event->getUrl()}}">{{$event->title}}</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat"></span>
                                        <p class="price ml-auto">{{$event->getDate()}} </p>
                                    </div>
                                    <p class="d-flex mb-0 d-block">
                                        <a href="{{$event->getUrl()}}" class="btn btn-secondary py-2 ml-1">{{__t('Деталі')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
