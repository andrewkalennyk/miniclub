@if(!empty($additionalImages))
    <div id="additionalImagesCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($additionalImages as $img)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ url($img) }}" class="d-block w-100" alt="Slide {{ $loop->index }}"
                         style="object-fit: contain; max-height: 500px;">
                </div>
            @endforeach
        </div>
        <ol class="carousel-indicators">
            @foreach($additionalImages as $index => $img)
                <li data-target="#additionalImagesCarousel" data-slide-to="{{ $index }}"
                    class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <a class="carousel-control-prev" href="#additionalImagesCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#additionalImagesCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif
@section('additional_styles')
    <style>
        .carousel-control-prev-icon {
            filter: invert(10%) sepia(100%) saturate(300%) hue-rotate(180deg) brightness(80%) contrast(85%);
        }

        .carousel-control-next-icon {
            filter: invert(10%) sepia(100%) saturate(300%) hue-rotate(180deg) brightness(80%) contrast(85%);
        }
    </style>
@stop
