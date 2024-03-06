<?php

namespace App\Cms\Definitions;

use App\Models\ClubCar;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\{Foreign, Froala, Id, Image, MultiImage, Number, Relations\Options, Text};
use Vis\Builder\Services\Actions;

class ClubCars extends Resource
{
    public $model = ClubCar::class;
    public $title = 'Клубні тачки';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            Id::make('#', 'id')->sortable(),
            Text::make('Название', 'title')->language(),
            Froala::make('Опис', 'description')->language()->onlyForm(),
            Foreign::make('Модель', 'car_model_id')
                ->options((new Options('car_model'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            Foreign::make('Нік', 'user_id')
                ->options((new Options('user_model'))->keyField('social_name'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            Number::make('Рік', 'year')->onlyForm(),
            Text::make('Колір', 'color')->onlyForm(),
            Text::make('Пальне', 'petrol')->onlyForm(),
            Text::make('Трансмісія', 'transmission')->onlyForm(),
            Image::make('Превью', 'image'),
            Image::make('Фото заднього плану', 'background_image')->onlyForm(),
            MultiImage::make('Картинки доп', 'additional_images')->onlyForm()
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->clone();
    }
}
