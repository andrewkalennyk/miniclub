<?php

namespace App\Cms\Definitions;

use App\Models\Review;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, MultiImage, Relations\Options, Select, Text};
use Vis\Builder\Definitions\Resource;

class ReviewsApply extends Resource
{
    public $model = Review::class;
    public $title = 'Відгуки до сервісів';
    protected $orderBy = 'created_at desc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Foreign::make('Користувач', 'review_user_id')
                ->options((new Options('review_user'))->keyField('social_name'))
                ->nullable('...')
                ->default(null)
                ->filter(),
            Foreign::make('Сервіс', 'service_id')
                ->options((new Options('service'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->filter(),
            Text::make("Нік", 'social_name'),
            Text::make("Ім'я", 'name'),
            Froala::make('Описание', 'message')->onlyForm(),
            Text::make('Оцінка', 'rating'),
            Select::make('Статус', 'status')->options(
                [
                    null => 'Виберіть рішення',
                    'new' => 'Новий',
                    'done' => 'Опрацьовано',
                ]
            ),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }
}
