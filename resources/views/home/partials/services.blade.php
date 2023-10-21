<?php /* @var $service \App\Models\Service */?>

<section class="ftco-section shops-block">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading font-weight-bold">not normal</span>
                <h2 class="mb-3">{{__t('Перевірені Автосервіси')}}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <a href="{{$service->getUrl()}}">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <img src="{{$service->getImgPath('150', '155', ['image_title' => 'logo'])}}" class="card-img-top img-cover rounded-circle" alt="">
                            </div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">{{$service->t('title')}}</h3>
                                <p></p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @if($allServicesPage)
            <div class="row mt-2 mr-lg-1 justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                <a href="{{$allServicesPage->getUrl()}}">{{__t('Всі Сервіси')}}</a>
            </div>
        @endif
    </div>
</section>
