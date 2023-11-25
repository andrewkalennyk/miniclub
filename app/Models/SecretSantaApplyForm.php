<?php

namespace App\Models;

class SecretSantaApplyForm extends BaseModel
{
    protected $table = 'secret_santa_apply_form';

    protected $fillable = [
        'name',
        'social_name',
        'car_number',
        'car_details',
        'instagram',
        'email',
        'np_address',
        'about_description',
    ];

    public function createApply($data): bool
    {
        $data['rating'] = $data['ratingRating'];

        return (bool) self::create($data);
    }
}
