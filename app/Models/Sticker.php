<?php

namespace App\Models;

class Sticker extends BaseModel
{
    protected $table = 'stickers';
    protected $fillable = [];


    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    public function getPictureUrl(): string
    {
        return !empty($this->picture) ? public_path($this->picture) : '';
    }
}
