<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 mb-5">
            <h2 class="mb-3">Опис</h2>
            <p class="description">{!!$page->description!!}</p>
        </div>
    </div>
    @include('club-cars.partials.slider')
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-lg-8 mb-5">
            <div class="about-author d-flex align-items-center p-4 bg-light review">
                <div class="bio mr-5">
                    <img src="{{$page->image}}" width="200" height="200" alt="Image placeholder"
                         class="img-fluid mb-4 rounded">
                </div>
                <div class="desc">
                    <h3>{{$page->user_model->social_name}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@section('additional_scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const paragraphs = document.querySelectorAll('p > img.fr-dib');

            paragraphs.forEach(function (paragraph) {
                const nextSibling = paragraph.nextSibling;

                if (nextSibling && nextSibling.nodeType === Node.TEXT_NODE) {
                    const span = document.createElement('span');
                    span.innerHTML = nextSibling.nodeValue.trim();
                    span.style.marginLeft = '20px';

                    paragraph.parentNode.removeChild(nextSibling);

                    paragraph.parentNode.insertBefore(span, paragraph.nextSibling);
                }
                paragraph.style.float = 'left';
                paragraph.style.marginRight = '20px';
                paragraph.style.width = 'auto';
                paragraph.style.height = 'auto';
                paragraph.style.maxWidth = '50%';
            });
        });
    </script>
@stop
