<?php

namespace App\Models;

class Propose extends BaseModel
{
    protected $table = 'propositions';

    protected $fillable = [
        'social_name',
        'proposition'
    ];
}
