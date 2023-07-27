<?php

namespace App\Cms\Definitions;

use App\Models\City as CityModel;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{ Id, Text};
use Vis\Builder\Definitions\Resource;

class Cities extends Resource
{
    public $model = CityModel::class;
    public $title = 'Города';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
