<div class="col-md-4 d-flex align-items-center">
    <form action data-action="{{route('propose')}}" id="propose-form" name="propose" class="request-form ftco-animate bg-dark">
        <h2>{{__t('Пропозиції та побажання')}}</h2>
        <div class="form-group">
            <label for="" class="label">{{__t("Ім'я (При бажанні)")}}</label>
            <input type="text" name="social_name" class="form-control" placeholder="{{__t('Нік соціальної мережі')}}...">
        </div>
        <div class="form-group">
            <label for="" class="label">{{__t('Пропозиції')}}</label>
            <textarea type="text" name="proposition" rows="4"  class="form-control" placeholder=""></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="{{__t('Відправити')}}" class="btn btn-secondary py-3 px-4">
        </div>
    </form>
</div>
