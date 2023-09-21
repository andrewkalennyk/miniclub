<section class="ftco-section clubs-block">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading font-weight-bold">not normal</span>
                <h2 class="mb-3">{{__t('Локальні клуби')}}</h2>
            </div>
        </div>
        <div class="row carousel-local-club owl-carousel">
            @foreach($clubs as $club)
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{$club->getImgPath(640,640)}}" class="card-img img-cover rounded-circle shadow" alt="">
                        </div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">{{$club->city->t('title')}}</h3>
                            <p></p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>
