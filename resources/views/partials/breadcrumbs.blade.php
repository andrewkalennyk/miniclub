<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            @if(count($breadcrumbs->crumbs))
                <p class="breadcrumbs">
                    @foreach($breadcrumbs->crumbs as $breadcrumb)
                        @if(!$loop->last)
                            <span @if($loop->first) class="mr-2" @endif>
                    <a href="{{$breadcrumb['url']}}">{{$breadcrumb['title']}}
                        <i class="ion-ios-arrow-forward"></i>
                    </a>
                </span>
                        @endif
                    @endforeach

                </p>
            @endif
            <h1 class="mb-3 bread">{{$breadcrumbs->pop()['title']}}</h1>
        </div>
    </div>
</div>
