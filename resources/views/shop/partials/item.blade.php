<div class="col-md-4 col-sm-6 col-xs-12 mb-3 align-items-stretch">
    <div class="card rounded ftco-animate border-0 shadow-sm h-100">
        <div class="card-img-wrapper d-flex align-items-center justify-content-center"
             style="height: 200px; overflow: hidden;
             ">
            <img src="{{$product->getPictureUrl()}}"
                 class="w-100"
                 style="object-fit: contain;"
                 alt="{{$product->t('title')}}">
        </div>
        <div class="card-body pb-0">
            <h5 class="card-title font-weight-normal">{{$product->t('title')}}</h5>
            <div class="d-flex">
                <span class="cat"></span>
                <p class="price ml-auto font-weight-bold text-primary"> {{$product->getPrice()}}</p>
            </div>
        </div>
    </div>
</div>
