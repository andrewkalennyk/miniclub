<form action="#"
      data-action="{{route('event-form')}}"
      name="event-form"
      id="event-form"
      class="bg-light p-5 event-form">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" id="datepicker" name="date" placeholder="{{__t('Дата')}}">
    </div>
    <div class="form-group">
        <input type="time" class="form-control" name="time" placeholder="{{__t('Час')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="description" placeholder="{{__t('Опис')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="social_name" placeholder="{{__t('Ваш телеграм нік')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="map_point" placeholder="{{__t('Мітка на карті')}}">
    </div>
    <div class="form-group">
        <input type="submit" value="{{__t('Відправити')}}" class="btn btn-primary py-3 px-5">
    </div>
    <div class="alert alert-success d-none" role="alert"></div>
    <div class="alert alert-warning d-none" role="alert"></div>
</form>
