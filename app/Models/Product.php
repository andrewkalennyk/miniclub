<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $fillable = [];


    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    public function getPictureUrl(): string
    {
        return !empty($this->picture) ? asset($this->picture) : '';
    }

    public function getPrice(): string
    {
        return !empty($this->price) ? $this->price  : '';
    }
}
