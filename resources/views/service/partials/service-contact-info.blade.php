<div class="col-md d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services">
        <div class="media-body py-md-4">
            <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-route"></span>
                </div>
                <div class="text">
                    <h3 class="heading mb-0 pl-3">
                        {{__t('Адреса')}}
                        <span>{{$page->address}}</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services">
        <div class="media-body py-md-4">
            <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-pistons"></span>
                </div>
                <div class="text">
                    <h3 class="heading mb-0 pl-3">
                        {{__t('Телефон')}}
                        <span>{{$page->number}}</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services">
        <div class="media-body py-md-4">
            <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-transportation"></span>
                </div>
                <div class="text">
                    <h3 class="heading mb-0 pl-3">
                        {{__t('Прокласти маршрут')}}
                        {{--<span>5 Adults</span>--}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services">
        <div class="media-body py-md-4">
            <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                <div class="text">
                    <h3 class="heading mb-0 pl-3">
                        {{__t('Сайт')}}
                        <span>
                                            <a href="{{$page->site_url}}" target="_blank">Перейти</a></span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
