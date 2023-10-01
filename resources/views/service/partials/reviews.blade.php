<?php
/** @var $review \App\Models\ServiceReview **/
?>
<h3 class="head">{{__t('Відгуків: ')}} {{$page->reviews->count()}}</h3>
@if ($page->reviews->count())
    @foreach($page->reviews as $review)
        <div class="review d-flex">
            <div class="user-img" style="background-image: url({{$review->getReviewerPicture()}})"></div>
            <div class="desc">
                <h4>
                    <span class="text-left">{{$review->getReviewerName()}}</span>
                    <span class="text-right">{{$review->getDate()}}</span>
                </h4>
                <p class="star">
                    <span>
                        @for($i = 0; $i < $review->getMark(); $i++)
                            <i class="ion-ios-star"></i>
                        @endfor
                    </span>
                    {{--<span class="text-right">
                        <a href="#" class="reply"><i class="icon-forward"></i></a>
                    </span>--}}
                </p>
                {!! $review->getComment() !!}

                @if($review->isHugeComment())
                    <p>
                        <a href="{{$review->getUrl()}}" type="button" class="btn btn-info">Детальніше</a>
                    </p>
                @endif
            </div>
        </div>
    @endforeach
@endif

