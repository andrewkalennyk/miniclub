<?php

namespace App\Cms\Definitions;

use App\Models\ClubPromotion;
use App\Models\InterestingFact;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Select, Text, Textarea};
use Vis\Builder\Definitions\Resource;

class InterestingFacts extends Resource
{
    public $model = InterestingFact::class;
    public $title = 'Цікаві факти';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Froala::make('Факт', 'fact')
                ->nullable('...')
                ->default(null),
            Select::make('Тип', 'type')->options(
                [
                    null => 'Виберіть тип',
                    InterestingFact::FUN => 'Веселий',
                    InterestingFact::CLUB_LINKS => 'Корисні клубні лінки',
                ]
            ),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
