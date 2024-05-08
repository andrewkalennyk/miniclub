@if($faqItems->count())
    <section class="ftco-section ftco-intro faq-block" style="background-image: url(/images/not-normal-mirror.webp);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-9 heading-section ftco-animate">
                    <div class="accordion" id="accordionFaq">
                        @foreach($faqItems as $faqItem)
                            <div class="card">
                                <div class="card-header" id="heading{{$loop->index}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left {{$loop->first ? 'collapsed' : ''}}" type="button" data-toggle="collapse" data-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                            {{ $faqItem->t('title') }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse{{$loop->index}}" class="collapse {{$loop->first ? 'show' : ''}}" aria-labelledby="heading{{$loop->index}}" data-parent="#accordionFaq">
                                    <div class="card-body text-secondary">
                                        <div class="card-text">
                                            {!! $faqItem->t('text') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
