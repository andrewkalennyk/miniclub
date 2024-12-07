<?php

namespace App\Models;

use Illuminate\Http\Request;

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
        'about_description_details',
        'is_with_pet',
    ];

    public function createApply($data): bool
    {
        return (bool) self::create($data);
    }

    public function updateApplyFormDetails(Request $data): bool
    {
        $this->about_description_details = $data->get('about_description_details');

        return $this->save();
    }
}
