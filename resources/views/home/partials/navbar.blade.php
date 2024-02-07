<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{asset('/')}}">
                <img src="{{asset('/images/mini-logo-header-white.png')}}" width="90" height="90" alt="" id="logo-w">
                <img src="{{asset('/images/mini-logo-header.png')}}" width="90" height="90" alt="" id="log-d" style="display: none">
            </a>
            <a href="https://t.me/mini_club_ua_bot" class="navbar-brand ml-auto" target="_blank">
                <img class="img-cover rounded-circle" src="{{asset('/images/bot-logo.jpeg')}}" width="75" height="75" alt="logo-bot">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{__t('Меню')}}
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="event-link-block">{{__t('Клуб')}}</a>
                </li>
                @if($menuItems->count())
                    @foreach($menuItems as $item)
                        <li class="nav-item">
                            <a href="{{$item->getUrl()}}" class="nav-link font-weight-bold">{{$item->t('title')}}</a>
                        </li>
                    @endforeach
                @endif
                {{--<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="events-block">{{__t('Зустрічі')}}</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="shops-block">{{__t('Автосервіси')}}</a>
                </li>--}}
                @if(!empty($faqItems))
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="faq-block">FAQ</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ucfirst(app()->getLocale())}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($langs as $slug => $title)
                            @if($slug !== app()->getLocale() )
                                <a class="dropdown-item" href="{{geturl(request()->fullUrl(), $slug)}}">{{ucfirst($title)}}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
