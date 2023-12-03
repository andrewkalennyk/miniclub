<?php

namespace App\Cms\Definitions;

use App\Models\ClubPromotion;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Text};
use Vis\Builder\Definitions\Resource;

class ClubPromotions extends Resource
{
    public $model = ClubPromotion::class;
    public $title = 'Пропозиція для клуба';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Froala::make('Умова', 'condition')->language(),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
