<?php

namespace App\Cms\Definitions;

use App\Models\ClubPromotion;
use App\Models\Sticker;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, Text, Textarea};
use Vis\Builder\Definitions\Resource;

class Stickers extends Resource
{
    public $model = Sticker::class;
    public $title = 'Наліпки';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Назва', 'title'),
            Image::make('Картинка', 'picture'),
            Checkbox::make('Активность', 'is_active')->filter(),
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
