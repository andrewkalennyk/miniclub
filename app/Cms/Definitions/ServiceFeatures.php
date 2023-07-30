<?php

namespace App\Cms\Definitions;

use App\Models\ServiceFeature;
use App\Models\ServiceType;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Id, Text};
use Vis\Builder\Definitions\Resource;

class ServiceFeatures extends Resource
{
    public $model = ServiceFeature::class;
    public $title = 'Особливості сервісів';
    protected $orderBy = 'priority asc';
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
