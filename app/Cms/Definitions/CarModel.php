<?php

namespace App\Cms\Definitions;

use App\Models\CarModel as CarModelModel;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\{Checkbox, Foreign, Id, Relations\Options, Text, Number};
use Vis\Builder\Services\Actions;

class CarModel extends Resource
{
    public $model = CarModelModel::class;
    public $title = 'Модель  міні';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Foreign::make('Група', 'car_group_id')
                ->options((new Options('car_group'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            Number::make('Кількість дверей', 'door_count'),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
