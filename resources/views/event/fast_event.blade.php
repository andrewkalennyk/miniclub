@extends('layouts.default')

@section('main')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{$treePage->picture}}');" data-stellar-background-ratio="0.5">
        @include('partials.breadcrumbs')
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="text text-center">
                            <span class="subheading">Mini</span>
                            <h2>{{$page->t('title')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/user.png" style="width: 50px; height: 50px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Відповідальний')}}
                                        <span>{{$page->responsible}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/calendar-icon.png" style="width: 50px; height: 50px;"></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Дата')}}
                                        <span>{{$page->getDate()}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate fadeInUp ftco-animated">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <img src="/images/time.png" style="width: 40px; height: 40px;">
                                </div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        {{__t('Час')}}
                                        <span>{{$page->time}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="ftco-animate fadeInUp ftco-animated">
                        <h3></h3>
                        @if(!empty($page->short_description))
                            {!! $page->short_description !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="ftco-animate fadeInUp ftco-animated">
                        <h3>{{__t('Cписок участників')}} ({{$page->users->count()}})</h3>
                        @if(!$page->users->count())
                            <p>
                                {{__t('Наразі учасників немає!')}}
                            </p>
                        @endif

                        <div class="tagcloud">
                            @if($page->users->count())
                                @foreach($page->users as $user)
                                    <a href="{{$user->getUrl()}}" class="tag-cloud-link" style="font-size: 15px;">{{$user->user}}</a>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6 col-xl-6 col-lg-6 col-xs-12">
                    <div class="alert alert-info text-center" role="alert">
                        <form action="#" data-action="{{route('fast-event-checkin-form')}}" method="POST"
                              name="check-in-form"
                              id="check-in-form"
                        >
                            <div class="input-group mb-3">
                                {{csrf_field()}}
                                <input type="hidden" name="fast_event_id" value="{{$page->id}}">
                                <input type of="text" class="form-control"
                                       placeholder="Telegram Нік"
                                       aria-label="Telegram Нік"
                                       id="autocomplete-input"
                                       name="user"
                                       aria-describedby="button-addon2">
                                <div id="autocomplete-list" class="list-group"></div>

                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-outline-secondary" type="submit">{{__t('Чекін')}}</button>
                                </div>
                            </div>
                            <div class="alert alert-success d-none" role="alert"></div>
                            <div class="alert alert-warning d-none" role="alert"></div>
                            <div class="alert alert-danger d-none" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('additional_scripts')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form.js"></script>
    <script>
        Form.userNameData = {{$page->user?->pluck('user')->toArray() ?? '[]'}};
    </script>
@stop
