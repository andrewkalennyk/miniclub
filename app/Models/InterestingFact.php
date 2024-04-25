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

    public const WEEK_TYPE = [
        1 => 'fun',
        2 => 'club_links',
        3 => 'fun',
        4 => 'club_links',
        5 => 'fun',
    ];

    const FUN = 'fun';
    const CLUB_LINKS = 'club_links';
}
