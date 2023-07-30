<div class="row">
    @foreach($features as $chunk)
        <div class="col-md-4">
            <ul class="features">
                @foreach($chunk as $feature)
                    <li class="check"><span class="ion-ios-checkmark"></span>{{$feature->t('title')}}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
