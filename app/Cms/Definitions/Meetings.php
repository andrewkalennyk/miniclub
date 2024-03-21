<?php

namespace App\Cms\Definitions;

use App\Models\Meeting;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\Datetime;
use Vis\Builder\Fields\Id;
use Vis\Builder\Fields\Text;
use Vis\Builder\Services\Actions;

class Meetings extends Resource
{
    public $model = Meeting::class;
    public $title = 'Пропозиції зустрічей';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id'),
            Datetime::make('Дата', 'date')->sortable(),
            Text::make('Час', 'time'),
            Text::make('Опис', 'description'),
            Text::make('Нік', 'social_name'),
            Text::make('Точка на мапі', 'map_point'),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
