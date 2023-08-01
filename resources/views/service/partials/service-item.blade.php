<div class="col-md-4 col-sm-6 col-xs-12 mb-3 align-items-stretch service @if(empty($open)) d-none @endif" data-type="{{$service->service_type->type}}">
    <div class="card rounded ftco-animate border-0 shadow-sm h-100">
        <a href="{{$service->getUrl()}}">
            <img src="{{$service->logo}}" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <a href="{{$service->getUrl()}}">
                <h5 class="card-title">{{$service->t('title')}}</h5>
            </a>
            <div class="card-text d-flex">
                <span class="text-left">{{__t('Місто')}}</span>
                <p class="ml-auto text-right text-primary">{{$service->city->t('title')}}</p>
            </div>
            <div class="card-text d-flex">
                <span class="text-left">{{__t('Адреса')}}</span>
                <p class="ml-auto text-right text-primary">{!! $service->address !!}</p>
            </div>
            <div class="card-text d-flex">
                <span class="text-left">{{__t('Телефон')}}</span>
                <p class="ml-auto text-right text-primary">{!! $service->number !!}}</p>
            </div>
            <div class="card-text d-flex justify-content-lg-end">
                @if($service->site_url)
                    <a href="{{$service->site_url}}" target="_blank" class="btn btn-primary py-2 mr-1 w-50">{{__t('Сайт Сервісу')}}</a>
                @endif
                <a href="{{$service->getUrl()}}" class="btn btn-secondary py-2 ml-1 w-50">{{__t('Детальніше')}}</a>
            </div>
        </div>
    </div>
</div>
