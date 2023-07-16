<div class="col-md-4 d-flex align-items-center">
    <form action data-action="{{route('propose')}}" id="propose-form" name="propose" class="request-form ftco-animate bg-dark">
        <h2>Пропозиції та побажання</h2>
        <div class="form-group">
            <label for="" class="label">Ім'я(При бажанні)</label>
            <input type="text" name="social_name" class="form-control" placeholder="Нік соц мережі...">
        </div>
        <div class="form-group">
            <label for="" class="label">Пропозиції</label>
            <textarea type="text" name="proposition" rows="4"  class="form-control" placeholder=""></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Відправити" class="btn btn-secondary py-3 px-4">
        </div>
    </form>
</div>
