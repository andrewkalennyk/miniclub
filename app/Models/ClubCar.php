<?php

namespace App\Models;

use Illuminate\Support\Str;

class ClubCar extends BaseModel
{
    protected $table = 'club_cars';
    protected $fillable = [];

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
        $slug = Str::slug($this->title, '-');
        return route('car-detail', ['title' => $slug]);
    }

}
