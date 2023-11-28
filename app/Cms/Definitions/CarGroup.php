<?php

namespace App\Cms\Definitions;

use App\Models\CarGroup as CarGroupModel;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Id, Text};
use Vis\Builder\Definitions\Resource;

class CarGroup extends Resource
{
    public $model = CarGroupModel::class;
    public $title = 'Група міні';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
