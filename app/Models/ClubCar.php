<?php

namespace App\Models;

use Illuminate\Support\Str;

class ClubCar extends BaseModel
{
    protected $table = 'club_cars';
    protected $fillable = [];
    const FUEL_PETROL = 'бензин';
    const FUEL_DIESEL = 'дизель';
    const FUEL_ELECTRIC = 'електро';
    const TRANSMISSION_MANUAL = 'механіка';
    const TRANSMISSION_AUTOMATIC = 'автомат';

    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function user_model()
    {
        return $this->belongsTo(ReviewUser::class, 'user_id');
    }

    public function getUrl()
    {
        return route('car-detail', [$this->slug]);
    }

    public function getAddImages(): array
    {
        return array_map(function ($image) {
            return str_replace('//','/', $image);
        }, $this->getOtherImg('additional_images'));
    }

    public function getCarGroupTitleAttribute()
    {
        return $this->car_model->car_group->title;
    }

    public function getCarModelDoorCountAttribute()
    {
        return $this->car_model->door_count;
    }

    public static function getFuelTypes(): array
    {
        return [
            self::FUEL_PETROL => 'Бензин',
            self::FUEL_DIESEL => 'Дизель',
            self::FUEL_ELECTRIC => 'Электро',
        ];
    }
    public static function getTransmissionTypes(): array
    {
        return [
            self::TRANSMISSION_MANUAL => 'Механіка',
            self::TRANSMISSION_AUTOMATIC => 'Автомат',
        ];
    }

}
