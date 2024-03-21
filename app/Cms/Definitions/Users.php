<?php

namespace App\Cms\Definitions;

use App\Models\User;
use Carbon\Carbon;
use Vis\Builder\Services\Actions;
use Vis\Builder\Fields\ManyToMany;
use Vis\Builder\Fields\Readonly;
use Vis\Builder\Fields\Relations\Options;
use Vis\Builder\Fields\Password;
use Vis\Builder\Fields\Checkbox;
use Vis\Builder\Fields\Id;
use Vis\Builder\Fields\Text;

use Vis\Builder\Definitions\Resource;

class Users extends Resource
{
    public $model = User::class;
    public $title = 'Пользователи';
    protected $orderBy = 'created_at desc';

    public function fields()
    {
        return [
            'Общая' => [
                Id::make('#', 'id')->sortable(),
                Text::make('Email', 'email')->sortable()->filter(),
                Password::make('Пароль', 'password')->onlyForm(),
                Text::make('Фамилия', 'last_name')->sortable()->filter(),
                Text::make('Имя', 'first_name')->sortable()->filter(),
                Checkbox::make('Активен', 'completed')->hasOne('activation'),
                Checkbox::make('Відправка інформації про івент на пошту', 'admin_apply_email')->onlyForm(),
                /*Readonly::make('Дата регистрации', 'created_at')->default(Carbon::now())->sortable(),
                Readonly::make('Дата последнего входа', 'last_login')->sortable()*/
            ],

            'Группа' => [
                ManyToMany::make('Группа')->options(
                    (new Options('groups'))->keyField('name')
                ),
            ]

        ];
    }

    public function actions()
    {
        return Actions::make()->insert()->update()->delete();
    }
}
