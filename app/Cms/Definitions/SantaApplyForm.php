<?php

namespace App\Cms\Definitions;

use App\Models\LocalClub;
use App\Models\SecretSantaApplyForm;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, Image, Relations\Options, Text};
use Vis\Builder\Definitions\Resource;

class SantaApplyForm extends Resource
{
    public $model = SecretSantaApplyForm::class;
    public $title = 'Заявки на таємного санту';
    protected $orderBy = 'created_at asc';
    protected $isSortable = false;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make("Ім'я", 'name'),
            Text::make("Нік", 'social_name'),
            Text::make("Номер машини", 'car_number'),
            Text::make("Деталі машини", 'car_details'),
            Text::make("Інста", 'instagram')->onlyForm(),
            Text::make("Email", 'email'),
            Text::make("Нова Пошта відділення", 'np_address')->onlyForm(),
            Froala::make("Опис", 'about_description')->onlyForm(),
            Froala::make("Додатковий опис", 'about_description_details')->onlyForm(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
