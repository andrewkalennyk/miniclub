<?php

namespace App\Cms\Definitions;

use App\Models\ServiceReview;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, MultiImage, Relations\Options, Text};
use Vis\Builder\Definitions\Resource;

class ServiceReviews extends Resource
{
    public $model = ServiceReview::class;
    public $title = 'Відгуки до сервісів';
    protected $orderBy = 'created_at asc';
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
            Froala::make('Описание', 'comment')->onlyForm(),
            Text::make('Оцінка', 'mark'),
            MultiImage::make('Картинки доп', 'pictures')->onlyForm(),
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }
}
