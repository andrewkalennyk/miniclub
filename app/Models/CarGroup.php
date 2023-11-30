<?php

namespace App\Models;

class CarGroup extends BaseModel
{
    protected $table = 'car_groups';
    protected $fillable = [];


    public function car_instructions()
    {
        return $this->hasMany(CarInstruction::class);
    }

}
