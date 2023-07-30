<div class="col-md-4 service @if(empty($open)) d-none @endif" data-type="{{$service->service_type->type}}">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url({{$service->logo}});">
        </div>
        <div class="text">
            <h2 class="mb-0">
                <a href="#">{{$service->t('title')}}</a>
            </h2>
            <div class="d-flex mb-3">
                <span class="cat">{{__t('Місто')}}</span>
                <p class="price ml-auto">{{$service->city->t('title')}}</p>
            </div>
            <div class="d-flex mb-3">
                <span class="cat">{{__t('Адреса')}}</span>
                <p class="price ml-auto">{{$service->address}}</p>
            </div>
            <div class="d-flex mb-3">
                <span class="cat">{{__t('Телефон')}}</span>
                <p class="price ml-auto">{{$service->number}}</p>
            </div>
            <p class="d-flex mb-0 d-block justify-content-end">
                @if($service->site_url)
                    <a href="{{$service->site_url}}" target="_blank" class="btn btn-primary py-2 mr-1 ">{{__t('Сайт Сервісу')}}</a>
                @endif
                <a href="{{$service->getUrl()}}" class="btn btn-secondary py-2 ml-1 justify-content-end">{{__t('Детальніше')}}</a>
            </p>
        </div>
    </div>
</div>
