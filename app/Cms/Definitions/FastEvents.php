<?php

namespace App\Cms\Definitions;

use App\Models\Event;
use App\Models\FastEvent;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Froala, Id, Checkbox, Datetime, Image, MultiImage, Text};
use Vis\Builder\Definitions\Resource;

class FastEvents extends Resource
{
    public $model = FastEvent::class;
    public $title = 'Швидкі зустрічі';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title'),
            Froala::make('Описание', 'short_description')->nullable('...')
                ->default(null)->onlyForm(),
            Text::make('Дата', 'date'),
            Text::make('Час', 'time'),
            Text::make('Відповідальний', 'responsible'),
            Text::make('Url', 'slug')->onlyForm(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
