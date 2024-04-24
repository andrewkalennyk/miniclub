<?php

namespace App\Models;

class InterestingFact extends BaseModel
{
    protected $table = 'interesting_facts';

    protected $fillable = [
        'fact',
        'type',
        'is_active',
    ];

    const FUN = 'fun';
    const CLUB_LINKS = 'club_links';
}
