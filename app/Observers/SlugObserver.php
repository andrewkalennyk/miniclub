<?php


namespace App\Observers;


use Illuminate\Support\Str;

class SlugObserver
{
    public function saving($object) {
        $object->slug = !$object->slug ? Str::slug(request('title')) : $object->slug;
    }
}
