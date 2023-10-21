<?php /* @var $club \App\Models\LocalClub */?>


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
                @if($club->hasUrl())
                    <a href="{{$club->getUrl()}}">
                        @include('home.partials.club.club')
                    </a>
                @else
                    @include('home.partials.club.club')
                @endif
            @endforeach
        </div>
    </div>
</section>
