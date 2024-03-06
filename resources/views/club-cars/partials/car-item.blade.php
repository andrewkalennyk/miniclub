<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
        <div class="img rounded d-flex align-items-end" style="background-image: url('{{ $car->image }}');">
        </div>
        <div class="text text-center">
            <h2 class="mb-0">{{ $car->title }}</h2>
            <a href="{{ $car->getUrl() }}" class="btn btn-secondary py-2 mt-2">
                {{ __t('Детальніше') }}
            </a>
        </div>
    </div>
</div>
