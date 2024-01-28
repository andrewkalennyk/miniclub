<?php

namespace App\Cms\Definitions;

use App\Models\ClubCar;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\{Froala, Id, Text};
use Vis\Builder\Services\Actions;

class ClubCars extends Resource
{
    public $model = ClubCar::class;
    public $title = 'Клубні тачки';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Froala::make('Опис', 'description')->language()
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
