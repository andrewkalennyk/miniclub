<div class="col-md-4 col-sm-6 col-xs-12 mb-3 align-items-stretch service @if(empty($open)) d-none @endif" data-type="{{$service->service_type->type}}">
    <div class="card rounded ftco-animate border-0 shadow-sm h-100">
        <a href="{{$service->getUrl()}}" class="embed-responsive">
            <img src="{{$service->logo}}" class="card-img-top" alt="...">
        </a>
        <div class="card-body flex-column">
            <a href="{{$service->getUrl()}}" class="d-flex">
                <h5 class="card-title">{{$service->t('title')}}</h5>
                @if($mark = $service->getMark())
                    <span class="ml-auto text-right">{{$mark}} <i class="ion-ios-star"></i></span>
                @endif
            </a>
            <p class="card-text d-flex">
                <span class="text-left">{{__t('Місто')}}</span>
                <span class="ml-auto text-right text-primary">{{$service->city->t('title')}}</span>
            </p>
            <p class="card-text d-flex">
                <span class="text-left">{{__t('Адреса')}}</span>
                <span class="ml-auto text-right text-primary">{!! $service->address !!}</span>
            </p>
            <p class="card-text d-flex">
                <span class="text-left">{{__t('Телефон')}}</span>
                <span class="ml-auto text-right text-primary">{!! $service->number !!}</span>
            </p>
        </div>
        <div class="d-flex mb-3 ml-2 mr-2">
            @if($service->site_url)
                <a href="{{$service->site_url}}" target="_blank" class="card-link btn btn-primary py-2 w-50">{{__t('Сайт Сервісу')}}</a>
            @endif
            <a href="{{$service->getUrl()}}" class="card-link btn btn-secondary py-2 w-50">{{__t('Детальніше')}}</a>
        </div>
    </div>
</div>
