<div class="rating-wrap">
    <h3 class="head">{{__t('Статистика')}}</h3>

    <div class="wrap">
        @foreach($page->getReviewStatistics() as $marks => $itemsCount)
            <p class="star">
                <span>

                    @for($i = 0; $i < $marks; $i++)
                        <i class="ion-ios-star"></i>
                    @endfor
                </span>
                <span>
                    {{$page->getReviewPercentage($itemsCount)}}
                </span>
                <span>{{__t('Відгуків')}} - {{$itemsCount}}</span>
            </p>
        @endforeach
    </div>
</div>
