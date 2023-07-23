<?php

namespace App\Cms\Definitions;

use App\Models\LocalClub;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Id, Image, Relations\Options, Text};
use Vis\Builder\Definitions\Resource;

class LocalClubs extends Resource
{
    public $model = LocalClub::class;
    public $title = 'Локальні клуби';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Foreign::make('Місто', 'city_id')
                ->options((new Options('city'))->keyField('title'))
                ->nullable('...')
                ->default(null),
            Image::make('Превью', 'picture'),
            Text::make('url', 'Url'),
            Text::make('Відповідальний', 'responsible'),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
