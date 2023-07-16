<?php

namespace App\Cms\Definitions;

use App\Models\Event;
use App\Models\Propose;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Froala, Id, Checkbox, Datetime, Image, MultiImage, Text};
use Vis\Builder\Definitions\Resource;

class Proposition extends Resource
{
    public $model = Propose::class;
    public $title = 'Предложения';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Ник социальной сети', 'social_name'),
            Froala::make('Описание', 'proposition'),
            Datetime::make('Дата создания', 'created_at')->sortable(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
