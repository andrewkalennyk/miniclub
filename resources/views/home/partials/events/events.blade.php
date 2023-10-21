<section class="ftco-section bg-light events-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading font-weight-bold">not normal</span>
                <h2 class="mb-2">{{__t('Наші зустрічі')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="carousel-car owl-carousel">
                    @foreach($events as $event)
                        <div class="card rounded ftco-animate border-0 shadow-sm h-100">
                            <a href="{{$event->getUrl()}}">
                                <img src="{{$event->getImgPath('330', '340')}}" class="card-img-top card-img-top-20" alt="...">
                            </a>
                            <div class="card-body pb-0">
                                <a href="{{$event->getUrl()}}">
                                    <h5 class="card-title font-weight-normal">{{$event->t('title')}}</h5>
                                </a>
                                <div class="d-flex">
                                    <span class="cat"></span>
                                    <p class="price ml-auto font-weight-bold text-primary">{{$event->getDate()}} </p>
                                </div>
                            </div>

                            <div class="d-flex mb-3 ml-3 mr-2">
                                <a href="{{$event->getUrl()}}" class="card-link btn btn-secondary py-2 w-50">{{__t('Деталі')}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(!empty($allEventPage))
            <div class="row mt-2 mr-lg-1 justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                <a href="{{$allEventPage->getUrl()}}">{{__t('Всі події')}}</a>
            </div>
        @endif
    </div>
</section>
