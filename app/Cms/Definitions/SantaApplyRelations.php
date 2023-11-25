<?php

namespace App\Cms\Definitions;

use App\Models\SecretSantaRelations;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, Image, Relations\Options, Text};
use Vis\Builder\Definitions\Resource;

class SantaApplyRelations extends Resource
{
    public $model = SecretSantaRelations::class;
    public $title = 'Таємний санта Розподіл';
    protected $orderBy = 'created_at asc';
    protected $isSortable = false;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make("Нік(хто)", 'social_name_from'),
            Text::make("Нік(кому)", 'social_name_to'),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
