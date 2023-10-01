<?php

namespace App\Cms\Definitions;

use App\Models\Faq as FaqModel;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Text, Textarea};
use Vis\Builder\Definitions\Resource;

class Faq extends Resource
{
    public $model = FaqModel::class;
    public $title = 'Faq';
    protected $orderBy = 'created_at asc';
    protected $isSortable = false;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Froala::make('Відповідь', 'text')->language(),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
