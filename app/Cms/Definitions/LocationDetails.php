<?php

namespace App\Cms\Definitions;

use App\Models\ClubPromotion;
use App\Models\LocationDetails as LocationDetailsModel;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, Text, Textarea};
use Vis\Builder\Definitions\Resource;

class LocationDetails extends Resource
{
    public $model = LocationDetailsModel::class;
    public $title = 'Деталі Локацій';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Image::make('Схема проїзду', 'schema'),
            Text::make('Посилання на відео', 'video_url')->onlyForm(),
            Text::make('Маршрут', 'map_url')->onlyForm(),
            Checkbox::make('Активність', 'is_active')->filter(),
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
