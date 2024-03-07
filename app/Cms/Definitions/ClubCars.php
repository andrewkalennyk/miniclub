<?php

namespace App\Cms\Definitions;

use App\Models\ClubCar;
use Vis\Builder\Definitions\Resource;
use Vis\Builder\Fields\{Checkbox, Foreign, Froala, Id, Image, MultiImage, Number, Relations\Options, Select, Text};
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
            Text::make('Url', 'slug'),
            Foreign::make('Модель', 'car_model_id')
                ->options((new Options('car_model'))->keyField('title'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            Foreign::make('Нік', 'user_id')
                ->options((new Options('user'))->keyField('social_name'))
                ->nullable('...')
                ->default(null)
                ->sortable(),
            Number::make('Рік', 'year')->onlyForm(),
            Text::make('Колір', 'color')->onlyForm(),
            Select::make('Пальне', 'petrol')
                ->options(ClubCar::FUEL)
                ->onlyForm(),
            Select::make('Трансмісія', 'transmission')
                ->options(ClubCar::TRANSMISSION)
                ->onlyForm(),
            Image::make('Превью', 'image'),
            Checkbox::make('Активность', 'is_active')->filter(),
            Image::make('Фото заднього плану', 'background_image')->onlyForm(),
            MultiImage::make('Картинки доп', 'additional_images')->onlyForm()
        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete()->preview()->clone();
    }
}
