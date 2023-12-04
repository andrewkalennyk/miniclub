<?php

namespace App\Models;

class ClubPromotion extends BaseModel
{
    protected $table = 'club_promotions';
    protected $fillable = [];


    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    public function getCondition(): string
    {
        return $this->condition ?? '';
    }

    public function getTelegramMessage()
    {

    }

}
