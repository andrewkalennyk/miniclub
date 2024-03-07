<?php

namespace App\Models;

class ClubCar extends BaseModel
{
    protected $table = 'club_cars';
    protected $fillable = [];


    const FUEL_PETROL = 'gas';
    const FUEL_DIESEL = 'diesel';
    const FUEL_ELECTRIC = 'electric';
    const TRANSMISSION_MANUAL = 'manual';
    const TRANSMISSION_AUTOMATIC = 'automatic';

    const FUEL = [
        self::FUEL_PETROL => 'Бензин',
        self::FUEL_DIESEL => 'Дизель',
        self::FUEL_ELECTRIC => 'Электро',
    ];

    const TRANSMISSION = [
        self::TRANSMISSION_MANUAL => 'Механіка',
        self::TRANSMISSION_AUTOMATIC => 'Автомат',
    ];

    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function user()
    {
        return $this->belongsTo(ReviewUser::class, 'user_id');
    }

    public function getUrl()
    {
        return route('car-detail', [ $this->slug ]);
    }

    public function getAddImages(): array
    {
        if(empty($this->getOtherImg('additional_images'))) {
            return [];
        }

        return array_map(function ($image) {
            return str_replace('//','/', $image);
        }, $this->getOtherImg('additional_images'));
    }

    public function getCarGroupTitle(): string
    {
        return $this->getModelTitle() .' '. $this->getGroupTitle();
    }

    public function getModelTitle(): string
    {
        return $this->car_model ? $this->car_model->t('title') : '';
    }

    public function getGroupTitle(): string
    {
        return ($this->car_model &&  $this->car_model->car_group) ?
            $this->car_model->car_group->t('title') : '';
    }

    public function getDoorCount(): string
    {
        return $this->car_model->door_count ?? '';
    }

    public function getUserSocialName(): string
    {
        return $this->user->social_name ?? '';
    }
}
