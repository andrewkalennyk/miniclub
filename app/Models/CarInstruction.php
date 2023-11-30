<?php

namespace App\Models;

class CarInstruction extends BaseModel
{
    protected $table = 'car_instructions';
    protected $fillable = [];


    public function car_group()
    {
        return $this->belongsTo(CarGroup::class, 'car_group_id');
    }
}
