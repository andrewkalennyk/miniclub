<?php

namespace App\Services;

use App\Models\SecretSantaApplyForm;
use App\Models\SecretSantaRelations;
use \Illuminate\Support\Collection;

class SecretSanta
{

    protected Collection $santaFromItems;
    protected Collection $santaToItems;

    protected Collection $santaRelations;

    protected int $relationsCount = 0;

    public function __construct(Collection $secretSanta)
    {
         $this->santaFromItems = $secretSanta;
         $this->santaToItems = clone $secretSanta;

         $this->santaRelations = collect([]);
         $this->relationsCount = $secretSanta->count();
    }

    public function doMakeRelations()
    {
        while ($this->santaRelations->count() < $this->relationsCount):
            $this->takeRelations();
        endwhile;
    }

    protected function takeRelations()
    {
        $santaFrom = $this->getSantaFrom();
        $santaTo = $this->getSantaTo($santaFrom);

        $relation = [
            'social_name_from' => $santaFrom->social_name,
            'social_name_to' => $santaTo->social_name
        ];

        $this->santaRelations->push($relation);
        SecretSantaRelations::create([
            'social_name_from' => $santaFrom->social_name,
            'social_name_to' => $santaTo->social_name
        ]);
    }

    protected function getSantaFrom(): SecretSantaApplyForm
    {
        $shuffledItems = $this->santaFromItems->shuffle();
        $santaFrom = $shuffledItems->first();

        $this->santaFromItems = $shuffledItems->skip(1);

        return $santaFrom;
    }

    protected function getSantaTo(SecretSantaApplyForm $santaFrom): SecretSantaApplyForm
    {
        $shuffledItems = $this->santaToItems->shuffle();
        $santaTo = $shuffledItems->where('social_name', '!=', $santaFrom->social_name)->first();

        $index = $shuffledItems->search(function ($item, int $key) use($santaTo) {
            return $item->social_name == $santaTo->social_name;
        });

        $this->santaToItems = $shuffledItems->forget($index);

        return $santaTo;
    }

}
