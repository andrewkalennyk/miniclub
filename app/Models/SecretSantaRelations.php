<?php

namespace App\Models;

class SecretSantaRelations extends BaseModel
{
    protected $table = 'secret_santa_relations';

    protected $fillable = [
        'social_name_from',
        'social_name_to',
    ];

    public function social_from()
    {
        return $this->hasOne(SecretSantaApplyForm::class, 'social_name', 'social_name_from');
    }

    public function social_to()
    {
        return $this->hasOne(SecretSantaApplyForm::class, 'social_name', 'social_name_to');
    }

}
