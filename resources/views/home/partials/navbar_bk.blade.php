<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="{{asset('/')}}">
            <img src="{{asset('/images/mini-logo-header-white.png')}}" width="90" height="90" alt="" id="logo-w">
            <img src="{{asset('/images/mini-logo-header.png')}}" width="90" height="90" alt="" id="log-d" style="display: none">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="event-link-block">{{__t('Клуб')}}</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="events-block">{{__t('Зустрічі')}}</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="shops-block">{{__t('Автосервіси')}}</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to font-weight-bold" data-scroll="stickers-block">{{__t('Наліпки')}}</a>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ucfirst(app()->getLocale())}}
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="languageDropdown">
                        @foreach($langs as $slug => $title)
                            @if($slug !== app()->getLocale() )
                                <a class="dropdown-item" href="{{geturl(request()->fullUrl(), $slug)}}">{{ucfirst($title)}}</a>
                            @endif
                        @endforeach
                    </div>
                </li>--}}
            </ul>
        </div>
    </div>
</nav>
