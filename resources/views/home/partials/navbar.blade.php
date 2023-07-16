<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
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
                {{--<li class="nav-item active">
                    <a href="index.html" class="nav-link">Home</a>
                </li>--}}
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to" data-scroll="event-link-block">Клуб</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to" data-scroll="events-block">Зустрічі</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to" data-scroll="shops-block">СТО</a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link scroll-to" data-scroll="stickers-block">Наліпки</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
