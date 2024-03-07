<?php /* @var $car \App\Models\ClubCar */?>

<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
        <div class="img rounded d-flex align-items-end" style="background-image: url('{{ $car->image }}');">
        </div>
        <div class="text text-center">
            <h2 class="mb-0">{{ $car->t('title') }}</h2>
            <p class="card-text d-flex">
                <span class="text-left">{{__t('Модель')}}</span>
                <span class="ml-auto text-right text-primary">{{ $car->getCarGroupTitle() }}</span>
            </p>
            <p class="card-text d-flex">
                <span class="text-left">{{__t('Кількість дверей')}}</span>
                <span class="ml-auto text-right text-primary">{{ $car->getDoorCount() }}</span>
            </p>
        </div>
        <div class="mt-auto">
            <a href="{{ $car->getUrl() }}" class="btn btn-primary py-2 w-100 text-center">{{__t('Детальніше')}}</a>
        </div>
    </div>
</div>
