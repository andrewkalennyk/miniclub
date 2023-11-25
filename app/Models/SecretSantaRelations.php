<?php

namespace App\Models;

class SecretSantaRelations extends BaseModel
{
    protected $table = 'secret_santa_relations';

    protected $fillable = [
        'social_name_from',
        'social_name_to',
    ];

}
