<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class Node extends ResourceTree
{
    protected $titleDefinition = 'Главный';
    public $action = 'HomeController@showPage';

    public function fields()
    {
        return [
            'Общее' => [
                Id::make('#', 'id')->sortable(),
                Text::make('Заголовок', 'title'),
                Froala::make('Описание', 'description'),
                Text::make('Url', 'slug'),
                Image::make('Картинка', 'picture'),
                MultiImage::make('Дополнительные картинки', 'additional_pictures'),
                Checkbox::make('Активно' ,'is_active'),
                Checkbox::make('Показувати у меню' ,'is_show_in_menu'),
            ],
            'SEO' => [
                Text::make('Seo title', 'seo_title')->language(),
                Textarea::make('Seo description', 'seo_description')->language()
            ]

        ];
    }
}
