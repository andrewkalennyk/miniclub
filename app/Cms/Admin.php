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
                'title' => 'Швидкі зустрічі',
                'icon'  => 'calendar',
                'link'  => '/fast_events',
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
                'title' => 'Гараж',
                'icon'  => 'car',
                'link'  => '/',
                'submenu' => [
                    [
                        'title' => 'Група',
                        'link'  => '/car_group',
                    ],
                    [
                        'title' => 'Модель',
                        'link'  => '/car_model',
                    ],
                    [
                        'title' => 'Тачки клуба',
                        'link'  => '/club_cars',
                    ],
                ],
            ],
            [
                'title' => 'Інструкції',
                'icon'  => 'id-card',
                'link'  => '/car_instructions',
            ],

            [
                'title' => 'Акції',
                'icon'  => 'percent',
                'link'  => '/club_promotions',
            ],
            [
                'title' => 'Наліпки',
                'icon'  => 'shopping-bag',
                'link'  => '/stickers',
            ],

            /*[
                'title' => 'Secret Santa',
                'icon'  => 'gift',
                'link'  => '/santa_apply_form',
                'submenu' => [
                    [
                        'title' => 'Заявки',
                        'link'  => '/santa_apply_form',
                    ],
                    [
                        'title' => 'Розподіл',
                        'link'  => '/santa_apply_relations',
                    ],
                ],
            ],*/

            [
                'title' => 'Cервіси',
                'icon'  => 'car',
                'link'  => '/proposition',
                'submenu' => [
                    [
                        'title' => 'Тип',
                        'link'  => '/service_types',
                    ],
                    [
                        'title' => 'Особливості',
                        'link'  => '/service_features',
                    ],
                    [
                        'title' => 'Cервіс',
                        'link'  => '/services',
                    ],
                    [
                        'title' => 'Користувачі',
                        'link'  => '/review_users',
                    ],
                    [
                        'title' => 'Відгуки',
                        'link'  => '/service_reviews',
                    ],
                    [
                        'title' => 'Відгуки (заявки)',
                        'link'  => '/reviews_apply',
                    ],
                    [
                        'title' => 'Новий сервіс (заявки)',
                        'link'  => '/share_service',
                    ],
                ],
            ],

            [
                'title' => 'FAQ',
                'icon'  => 'question-circle',
                'link'  => '/faq',
            ],
            [
                'title' => 'Деталі Локацій',
                'icon'  => 'tachometer',
                'link'  => '/location_details',
            ],

            [
                'title' => 'Пропозиції',
                'icon'  => 'question',
                'link'  => '/ask',
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
