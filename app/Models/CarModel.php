<?php

namespace App\Models;

class CarModel extends BaseModel
{
    protected $table = 'car_models';
    protected $fillable = [];


    public function car_group()
    {
        return $this->belongsTo(CarGroup::class, 'car_group_id');
    }
}
