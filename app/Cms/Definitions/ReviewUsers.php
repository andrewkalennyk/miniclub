<?php

namespace App\Cms\Definitions;

use App\Models\ReviewUser;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Id, Image, Text};
use Vis\Builder\Definitions\Resource;

class ReviewUsers extends Resource
{
    public $model = ReviewUser::class;
    public $title = 'Користувачі для відгуків';
    protected $orderBy = 'social_name asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make("Ім'я", 'name'),
            Text::make("Нік", 'social_name'),
            Image::make('Фото', 'picture')->onlyForm(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
