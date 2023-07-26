<?php

namespace App\Cms;

use Vis\Builder\Setting\AdminBase;

class Admin extends AdminBase
{
    protected $logoUrl = '';
    public function menu()
    {
        return [

            [
                'title' => 'Структура сайта',
                'icon'  => 'sitemap',
                'link'  => '/tree',
            ],

            [
                'title' => 'События',
                'icon'  => 'calendar',
                'link'  => '/events',
            ],

            [
                'title' => 'Города',
                'icon'  => 'building',
                'link'  => '/cities',
            ],

            [
                'title' => 'Локальные клубы',
                'icon'  => 'users',
                'link'  => '/local_clubs',
            ],

            [
                'title' => 'Предложения',
                'icon'  => 'bolt',
                'link'  => '/proposition',
            ],

            [
                'title' => 'Настройки',
                'icon'  => 'cog',
                'link'  => '/settings_block',
                'submenu' => [
                    [
                        'title' => 'Управление',
                        'link'  => '/settings/settings_all',
                    ],
                    [
                        'title' => 'Переводы CMS',
                        'link'  => '/translations_cms/phrases',
                    ],
                    [
                        'title' => 'Контроль изменений',
                        'link'  => '/revisions',
                    ],
                ],
            ],
            [
                'title' => 'Переводы',
                'icon'  => 'language',
                'link'  => '/translations/phrases',
            ],
            [
                'title' => 'Упр. пользователями',
                'icon'  => 'user',
                'link'  => '/users_group',
                'submenu' => [
                    [
                        'title' => 'Пользователи',
                        'link'  => '/users',
                    ],

                    [
                        'title' => 'Группы',
                        'link'  => '/groups',
                    ],

                ],
            ],
        ];
    }

}
