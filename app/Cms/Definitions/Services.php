<?php

namespace App\Cms\Definitions;

use App\Models\Service;
use App\Models\ServiceType;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\{Checkbox,
    Foreign,
    Id,
    Image,
    ManyToMany,
    ManyToManyMultiSelect,
    Relations\Options,
    Select,
    Text};
use Vis\Builder\Definitions\Resource;

class Services extends Resource
{
    public $model = Service::class;
    public $title = 'Сервіси';
    protected $orderBy = 'created_at asc';
    protected $isSortable = true;

    public function fields()
    {
        return [
            'Загальна Інформація' => [
                Id::make('#', 'id')->sortable(),
                Text::make('Название', 'title')->language(),
                Foreign::make('Місто', 'city_id')
                    ->options((new Options('city'))->keyField('title'))
                    ->nullable('...')
                    ->default(null)
                    ->filter(),
                Foreign::make('Тип', 'service_type_id')
                    ->options((new Options('service_type'))->keyField('title'))
                    ->nullable('...')
                    ->default(null)
                    ->filter(),
                ManyToManyMultiSelect::make('Особливості')->options(
                    (new Options('service_features'))->orderBy('priority')->keyField('title')
                ),
                Checkbox::make('Активность', 'is_active')->filter(),
                Checkbox::make('На головній', 'is_show_main')->filter(),
            ],
            'Контактна Інформація' => [
                Text::make('Адреса', 'address')->language()->onlyForm(),
                Text::make('Сторінка сервісу', 'site_url')->onlyForm(),
                Text::make('Телефон', 'number')->onlyForm(),
                Text::make('Контактна людина', 'contact_person')->onlyForm(),
                Text::make('Маршрут', 'google_url')->onlyForm(),
                Select::make('Думка експерта', 'expert_decision')->options(
                    [
                        null => 'Виберіть рішення',
                        'like' => 'Непогано',
                        'dislike' => 'Щось не дуже',
                    ]
                )->onlyForm(),
            ],
            'Медіа' => [
                Image::make('Лого', 'logo')->onlyForm(),
            ],
        ];
    }


    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->delete()->clone();
    }

}
