<?php

namespace App\Models;

use App\Models\Traits\OtherImageTrait;

class LocalClub extends BaseModel
{
    protected $table = 'local_club';
    protected $fillable = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getExtraUrl()
    {
        if ($this->url) {
            return $this->url;
        }

        if ($this->responsive) {
            return $this->responsive;
        }

        return 'javascript:void(0)';
    }

}
