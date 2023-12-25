<?php

namespace App\Cms\Definitions;

use App\Models\AskForm;
use App\Models\Faq as FaqModel;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Text, Textarea};
use Vis\Builder\Definitions\Resource;

class Ask extends Resource
{
    public $model = AskForm::class;
    public $title = 'Пропозиції';
    protected $orderBy = 'created_at asc';
    protected $isSortable = false;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Нік', 'social_name')->nullable('-'),
            Froala::make('Питання/Пропозиція', 'proposition'),
            Checkbox::make('Опрацьовано', 'is_answered')->filter(),
            Froala::make('Відповідь', 'answer'),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
