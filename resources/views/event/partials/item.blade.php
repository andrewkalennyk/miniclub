<div class="col-md-4 col-sm-6 col-xs-12 mb-3 align-items-stretch">
    <div class="card rounded ftco-animate border-0 shadow-sm h-100">
        <a href="{{$event->getUrl()}}">
            <img src="{{$event->picture}}" class="card-img-top card-img-top-20" alt="...">
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
</div>
