<?php

namespace App\Cms\Definitions;

use App\Models\ServiceReview;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, MultiImage, Relations\Options, Text};
use Vis\Builder\Definitions\Resource;

class ShareService extends Resource
{
    public $model = \App\Models\ShareService::class;
    public $title = 'Запропонований сервіс';
    protected $orderBy = 'created_at asc';
    protected $isSortable = false;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Назва', 'title'),
            Text::make('Ссилка', 'url'),
            Text::make('Ссилка (google)', 'google_map')->onlyForm(),
            Text::make('Тип', 'service_type'),
            Foreign::make('Місто', 'city_id')
                ->options((new Options('city'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->filter(),
            Text::make('Нік', 'social_name'),
            Froala::make('Описание', 'message')->onlyForm(),
            Text::make('Оцінка', 'rating')->onlyForm(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }
}
