<?php

namespace App\Cms\Definitions;

use App\Models\CarInstruction;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\{File, Foreign, Id, Relations\Options, Text};
use Vis\Builder\Services\Actions;

class CarInstructions extends Resource
{
    public $model = CarInstruction::class;
    public $title = 'ІнструкціЇ експлуатації';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Foreign::make('Група', 'car_group_id')
                ->options((new Options('car_group'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            File::make('Файл', 'file')
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }

}
