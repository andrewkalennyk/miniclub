<?php

namespace App\Cms\Definitions;

use App\Models\Event;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Froala, Id, Checkbox, Datetime, Image, MultiImage, Text};
use Vis\Builder\Definitions\Resource;

class Events extends Resource
{
    public $model = Event::class;
    public $title = 'События';
    protected $orderBy = 'event_date desc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Froala::make('Описание', 'description')->nullable('...')
                ->default(null)->language()->onlyForm(),
            Image::make('Превью', 'picture'),
            MultiImage::make('Картинки доп', 'additional_pictures')->onlyForm(),
            Checkbox::make('Активность', 'is_active')->filter(),
            Text::make('Url', 'slug')->onlyForm(),
            Datetime::make('Дата мероприятия', 'event_date')->sortable(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
