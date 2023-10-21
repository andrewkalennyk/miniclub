<?php /* @var $club \App\Models\LocalClub */?>

<div class="services services-2 w-100 text-center">
    <div class="icon d-flex align-items-center justify-content-center">
        <img src="{{$club->getImgPath(640,640)}}" class="card-img img-cover rounded-circle shadow" alt="">
    </div>
    <div class="text w-100">
        <h3 class="heading mb-2">{{$club->city->t('title')}}</h3>
        <p></p>
    </div>
</div>
