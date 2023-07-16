<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;

trait OtherImageTrait
{
    public function getOtherImg($nameField = 'additional_pictures', $paramImg = ''): Collection
    {
        $result = collect([]);
        if (! $this->$nameField) {
            return $result;
        }

        foreach (json_decode($this->$nameField) as $item) {
            if ($paramImg) {
                $result->put($item, glide($item, $paramImg));
            } else {
                $result->push($item);
            }
        }

        return $result;
    }

}
