<?php

namespace App\Cms\Definitions;

use App\Models\ServiceType;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Id, Text};
use Vis\Builder\Definitions\Resource;

class ServiceTypes extends Resource
{
    public $model = ServiceType::class;
    public $title = 'Типы Сервисов';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Text::make('Тип', 'type'),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
